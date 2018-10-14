<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\survey_type;
use App\survey;
use App\Http\Controllers\Auth;
use DB;

class surveyController extends Controller
{
    public function index()
    {
        $surveyDatas = DB::table('survey_types')->orderBy('stId', 'desc')->get();

        return view('surveys.index', compact('surveyDatas'));
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function graph()
    {
        $surveyDatas = DB::table('survey_types')->orderBy('stId', 'desc')->get();

        return view('surveys.graph', compact('surveyDatas'));
    }

    public function graphId($id)
    {
        // number data
        $resultDatas = DB::table('surveys')->where('sId', $id)->get();

        $numericArray = [];
        $stringArray = [];

        foreach($resultDatas as $resultData)
        {
            $answerArray = [];
            $stringVal = [];
            $sId = $resultData->sId;
            $answerValue = $resultData->answerValue;
            $answerValue = explode("@@@", $answerValue);

            for($i = 0; $i < count($answerValue); $i++)
            {
                if(is_numeric($answerValue[$i]))
                {
                    array_push($answerArray, $answerValue[$i]);
                }else{
                    array_push($stringVal, [
                        'id' => $i,
                        'val' => $answerValue[$i],
                    ]);
                }
            }
            array_push($stringArray, $stringVal);
            array_push($numericArray, $answerArray);
        }

        // 질문개수 크기, []으로 초기화된 배열
        if(empty($numericArray)){
            return view('surveys.graph_detail_fail');
        }
        $resultArray = array_fill(0, count($numericArray[0]), []);

        for($i = 0; $i < count($numericArray); $i++)
        {
            for($j = 0; $j < count($numericArray[$i]); $j++)
            {
                $val = $numericArray[$i][$j];
                array_push($resultArray[$j], $val);
            }
        }

        $countArray = [];
        for($i = 0; $i < count($resultArray); $i++)
        {
            array_push($countArray, array_count_values($resultArray[$i]));
        }


        // survey Q&A 가져오기
        $surveysData = DB::table('survey_types')->where('stId', $sId)->get();
        $optionArray = [];
        $optionArray2 = [];

        $surveyName = DB::table('survey_types')->where('stId', $sId)->value('stName');

        foreach($surveysData as $data)
        {
            $surveyQ = $data->question;
            $surveyA = $data->answer;

            $surveyQ = explode("///", $surveyQ);
            $surveyA = explode("///", $surveyA);
            for($i = 0; $i < count($surveyA); $i++)
            {
                array_push($optionArray, explode("@@@", $surveyA[$i]));
            }
        }

        for($i = 0; $i < count($optionArray); $i++)
        {
            if($optionArray[$i][0] != "asdfasdf23333")
            {
                array_push($optionArray2, [
                    'id'=> $i,
                    'array' => $optionArray[$i]
                ]);
            }
        }

        // 인덱스 안맞아서 맨앞에 요소 하나추가함 ㅠ
        for($i = 0; $i < count($optionArray2); $i++)
        {
            array_unshift($optionArray2[$i]['array'], "");
        }

        $datas = [
            'surveyName' => $surveyName,
            'countArray' => $countArray,
            'questionArray' => $surveyQ,
            'optionArray' => $optionArray2,
            'stringArray' => $stringArray,
        ];

        return view('surveys.graph_detail', $datas);
    }

    public function store(Request $request)
    {
        $stName = $request->stName;
        $stDev = $request->stDev;
        $questionArray = $request->questionArray;
        $answerArray = $request->answerArray;

        $markupedQStr = "";
        $markupedAStr = "";

        // questionArray 마크업 작업
        for($i = 0; $i < count($questionArray); $i++){
            if($i == count($questionArray)-1){
                $markupedQStr .= $questionArray[$i];
            } else {
                $markupedQStr .= $questionArray[$i] . "///";
            }
        }

        // answerArray 마크업 작업
        for($i = 0; $i < count($answerArray); $i++){
            for($j = 0; $j < count($answerArray[$i]); $j++){
                if($j == count($answerArray[$i])-1){
                    $markupedAStr .= $answerArray[$i][$j];
                } else {
                    $markupedAStr .= $answerArray[$i][$j] . "@@@";
                }
            }
            if($i != count($answerArray)-1){
                $markupedAStr .= "///";
            }
        }

        $surveyType = new survey_type();

        $surveyType->stName = $stName;
        $surveyType->stDev = $stDev;
        $surveyType->question = $markupedQStr;
        $surveyType->answer = $markupedAStr;

        $surveyType->save();

        return response()->json(['msg' => '설문지 작성을 완료했습니다.']);
    }

    public function show($id)
    {
        $surveyDatas = DB::table('survey_types')->where('stId', $id)->get();

        foreach($surveyDatas as $surveyData) {
            $id = $surveyData->stId;
            $name = $surveyData->stName;
            $description = $surveyData->stDev;
            $description = nl2br($description);

            //질문내용
            $questionStr = $surveyData->question;
            $questionStr = explode('///', $questionStr);

            //답변내용
            $answerStr = $surveyData->answer;
            $answerStr = explode('///', $answerStr);

            $answerRowArr = [];
            for($i = 0; $i < count($answerStr); $i++) {
                $tray = explode('@@@', $answerStr[$i]);

                array_push($answerRowArr, $tray);
            }

            $datas = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'questions' => $questionStr,
                'answers' => $answerRowArr
            ];
        }

        return view('surveys.detail', $datas);
    }

    public function surveysPost(Request $request)
    {
        $stId = $request->stId;
        $answerValue = $request->dataString;

        $survey = new survey();

        $survey->sId = $stId;
        $survey->userName = "gongsaeng";
        $survey->userNumber = "test";
        $survey->userEmail = "0421mk@gmail.com";
        $survey->answerValue = $answerValue;

        $survey->save();

        return view('surveys.result');
    }

    public function edit($id)
    {
        return __METHOD__ . ' show the form in view to edit the data in number : ' . $id;
    }

    public function update(Request $request, $id)
    {
        return __METHOD__ . ' edit the datas with primary key number : ' . $id;
    }

    public function destroy($id)
    {
        return __METHOD__ . ' delete the datas with primary key number : ' . $id;
    }

    public function ajaxControl(Request $request)
    {
        return response()->json(['val'=>$request->num]);
    }


}
