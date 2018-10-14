<style>
.gs_container {
  padding:25px;
  margin:40px;
  border:1px solid #ddd;
  background:#fafafa;
}
.gs_container .title {
  margin-bottom:10px;
  font-weight:bold;
  font-size:20px;
}
.gs_container .email {
  margin-bottom:10px;
  font-size:16px;
}
.gs_container .message {
  font-size:16px;
  line-height:24px;
}
</style>

<div class="gs_container">
    <div class="title">
        From: {{ $userName }}
    </div>
    <div class="email">
        Email: {{ $userEmail }}
    </div>
    <div class="message">
        {{ nl2br($userMessage) }}
    </div>
</div>
