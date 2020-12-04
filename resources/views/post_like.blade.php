<script>
    $(document).ready(function() {
        //like
        $('#like').click(function() {
            var id_like = $('#id_like').val();
            var like = 1;
            console.log(like);
            $.ajax({
                url: "{{url('/post_like/like')}}/{{$post->post_id}}",
                cache: false,
                type: "post",
                data: {
                    id_like:id_like,
                    like: like,
                    "_token": '{{ csrf_token() }}'
                },
                success: function(data) {
                    // console.log(data);
                    // console.log('Submission was successful.');
                    $('#post_like').load("{{url('post_like')}}/{{$post->post_id}}");

                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            })

        })
        // dislike
        $('#dislike').click(function() {
            var id_like = $('#id_like').val();
            var like = 2;
            console.log(like);
            $.ajax({
                url: "{{url('/post_like/like')}}/{{$post->post_id}}",
                cache: false,
                type: "post",
                data: {
                    id_like:id_like,
                    like:like,
                    "_token": '{{ csrf_token() }}'
                },
                success: function(data) {
                    // console.log(data);
                    // console.log('Submission was successful.');
                    $('#post_like').load("{{url('post_like')}}/{{$post->post_id}}");

                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            })

        })
        //reset
        $('#resetlike').click(function() {
            var id_like = $('#id_like').val();
            var like = 0;
            console.log(like);
            $.ajax({
                url: "{{url('/post_like/like')}}/{{$post->post_id}}",
                cache: false,
                type: "post",
                data: {
                    id_like:id_like,
                    like:like,
                    "_token": '{{ csrf_token() }}'
                },
                success: function(data) {
                    // console.log(data);
                    // console.log('Submission was successful.');
                    $('#post_like').load("{{url('post_like')}}/{{$post->post_id}}");

                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            })

        })
    })
</script>
<div class="row col-border-bottom">
    <div class="col-6">
        @if(Auth::check())
        @foreach($post_like as $row_post_like)
        @if($row_post_like->user_id == Auth::user()->id)
        @if($row_post_like->post_like == 0 and $row_post_like->post_dislike == 0)
        <input id="id_like" type="hidden" value="{{$row_post_like->id}}"/>
        <button class="btn_like" type='submit' id="like" title="Tôi thích bài viết này"><i  class="fas fa-thumbs-up " ></i></button>
        @endif
        @if($row_post_like->post_like == 0 and $row_post_like->post_dislike == 1)
        <input id="id_like" type="hidden" value="{{$row_post_like->id}}"/>
        <button class="btn_like" type='submit' id="like" title="Tôi thích bài viết này"><i  class="fas fa-thumbs-up " ></i></button>
        @endif
        @if($row_post_like->post_like == 1 and $row_post_like->post_dislike == 0)
        <input id="id_like" type="hidden" value="{{$row_post_like->id}}"/>
        <button class="btn_like" type='submit' id="resetlike" title="Bỏ thích"><i   class="fas fa-thumbs-up color-light-blue " ></i></button>
        @endif
        @endif
        @endforeach
        @else
        <button class="btn_like" type='submit' title="Tôi thích bài viết này"><i  class="fas fa-thumbs-up " ></i></button>
        @endif
       
          
       <!--  -->                  
       
        @php
        $like = 0;
        foreach($post_like as $row_post_like) {
        
        if($row_post_like->post_like==1){
        $like++;
        
        }
        }
        echo '<b>' . $like . '</b>';
        @endphp
    </div>
    <div class="col-6"> 
        @if(Auth::check())
        @foreach($post_like as $row_post_like)
        @if($row_post_like->user_id == Auth::user()->id)
        @if($row_post_like->post_like == 0 and $row_post_like->post_dislike == 0)
        <input id="id_like" type="hidden" value="{{$row_post_like->id}}"/>
        <button class="btn_like"  type='submit' id="dislike" title="Tôi không thích bài viết này"><i class="fas fa-thumbs-down"></i></button>
        @endif
        @if($row_post_like->post_like == 1 and $row_post_like->post_dislike == 0)
        <input id="id_like" type="hidden" value="{{$row_post_like->id}}"/>
        <button class="btn_like"  type='submit' id="dislike" title="Tôi không thích bài viết này"><i class="fas fa-thumbs-down"></i></button>
        @endif
        @if($row_post_like->post_like == 0 and $row_post_like->post_dislike == 1)
        <input id="id_like" type="hidden" value="{{$row_post_like->id}}"/>
        <button class="btn_like" type='submit' id="resetlike" title="Bỏ dislike"><i   class="fas fa-thumbs-down color-light-blue " ></i></button>
        @endif
        @endif
        @endforeach
        @else
        <button class="btn_like"  type='submit'  title="Tôi không thích bài viết này"><i class="fas fa-thumbs-down"></i></button>
        @endif
      <!--  -->
        @php
        $dislike = 0;
        foreach($post_like as $row_post_like) {
       
        if($row_post_like->post_dislike==1){
        $dislike++;
        }
       
        }
        echo '<b>' . $dislike . '</b>';
        @endphp
    </div>
</div>
@if(Auth::check())
@else
<p class="color-light-gray font-size-13"><a href="{{ route('login') }}">Đăng nhập</a>  để like bài viết này</p>
@endif
