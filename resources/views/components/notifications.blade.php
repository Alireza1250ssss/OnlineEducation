<div class="notif-cnt d-flex flex-column align-items-center">
   @if($type=='unread')
   <h3>Unread Notifications</h3>
   @else
   <h3>Read Notifications</h3>
   @endif
   @foreach($notifs as $notif)
   <div class="notif p-2 my-1 d-flex align-items-center justify-content-between">
      <p class="my-0">{{$notif->data['message']}} <b>{{$notif->data['course']}}</b></p>
      <input type="checkbox" name="id" class="align-self-center" value="{{$notif->id}}">
   </div>
   @endforeach
   <div class="btns">
      @if($type=='unread')
      <button class="bg-warning text-dark my-1 rounded-pill p-1 clearfix" id="markasreadbtn">Mark As Read</button>
      @else
      <button class="bg-danger text-white my-1 rounded-pill p-1 mx-md-2" id="deletenotifbtn">Delete !</button>
      @endif
   </div>
</div>