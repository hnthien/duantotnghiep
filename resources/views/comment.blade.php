          
<div class="comments-container">
                            <ul id="comments-list" class="comments-list">


                                @foreach($comments as $cmt)
                               
                                <li>
                                    <div class="comment-main-level row">
                                        <!-- Avatar -->
                                        @foreach($user as $av)
                                        @if($cmt->user_id == $av->id)
                                        <div class="comment-avatar col-1"><img src="{{ URL::asset('images/user') }}/{{$av->images_user}}" alt="ảnh đại diện"></div>
                                        @endif
                                        @endforeach
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box col-11">
                                            <div class="comment-head">
                                                <hp class="comment-name">
                                                    @foreach($user as $av)
                                                    @if($cmt->user_id == $av->id)
                                                    {{$av->name}}
                                                    @endif
                                                    @endforeach
                                                </hp>
                                                @php
                                                $carbon = new Illuminate\Support\Carbon;
                                                $carbon::setLocale('vi');
                                                $dt = $carbon::create(substr($cmt->created_at, 0, 4), substr($cmt->created_at, 5, 2), substr($cmt->created_at, 8, 2), substr($cmt->created_at, 11, 2), substr($cmt->created_at, 14, 2), substr($cmt->created_at, 17, 2));
                                                $now = $carbon::now();
                                                $datec = $dt->diffForHumans($now);
                                                @endphp
                                                @if (Auth::check())
                                                <script>
                                                    $(document).ready(function() {
                                                        $('#reply{{$cmt->comment_id}}').click(function() {
                                                            $("#bl{{$cmt->comment_id}}").slideToggle('slow');


                                                        });
                                                        $('#report{{$cmt->comment_id}}').click(function() {
                                                            $("#report_box{{$cmt->comment_id}}").show();


                                                        });
                                                    });
                                                </script> 
                                                 @endif
                                                <span>{{$datec}}</span>
                                                @if (Auth::check())
                                                <a href="" class="col-margin-left"> <button id="reply{{$cmt->comment_id}}" class=" col-hover col-border--none color-light-gray">Trả lời</button></a>
                                               
                                                <a href="{{url('admin/report/create_report')}}/{{$cmt->comment_id}}">
                                                <button onclick="return window.confirm('Bạn có chắc chắn bình luận này vi phạm Tiêu chuẩn cộng đồng và muốn Báo cáo?');" class=" col-hover col-border--none color-red">Báo cáo vi phạm</button>
                                                <a/>
                                                @endif
                                                
                                            </div>
                                            <div class="comment-content">
                                                {{$cmt->comment_content}}

                                            </div>
                                        </div>

                                    </div>


                                    <!-- Respuestas de los comentarios -->
                                    <ul class="comments-list reply-list ">
                                        @php
                                        $comment_branch = new App\Models\Comment();
                                        $data_comment_branch = $comment_branch->where('comment_branch',$cmt->comment_id)->where('comment_status',0)->orderBy('comment_id', 'DESC')->take(5)->get()
                                        @endphp
                                        @foreach($data_comment_branch as $row_comment_branch)
                                      
                                        <li>
                                            <div class="row">
                                                <!-- Avatar -->
                                                <div class="comment-avatar col-1">
                                                    @foreach($user as $av)
                                                    @if($row_comment_branch->user_id == $av->id)
                                                    <img src="{{ URL::asset('images/user') }}/{{$av->images_user}}" alt="">
                                                    @endif
                                                    @endforeach
                                                </div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box col-11">
                                                    <div class="comment-head">
                                                        <hp class="comment-name">
                                                            @foreach($user as $av)
                                                            @if($row_comment_branch->user_id == $av->id)
                                                            {{$av->name}}
                                                            @endif
                                                            @endforeach
                                                        </hp>
                                                        @php
                                                        $carbon = new Illuminate\Support\Carbon;
                                                        $carbon::setLocale('vi');
                                                        $dt = $carbon::create(substr($row_comment_branch->created_at, 0, 4), substr($row_comment_branch->created_at, 5, 2), substr($row_comment_branch->created_at, 8, 2), substr($row_comment_branch->created_at, 11, 2), substr($row_comment_branch->created_at, 14, 2), substr($row_comment_branch->created_at, 17, 2));
                                                        $now = $carbon::now();
                                                        $dateb = $dt->diffForHumans($now);
                                                        @endphp
                                                        <span>{{$dateb}}</span>
                                                        @if (Auth::check())
                                                        <a class="col-margin-left" href="{{url('admin/report/create_report')}}/{{$row_comment_branch->comment_id}}">
                                                        <button onclick="return window.confirm('Bạn có chắc chắn bình luận này vi phạm Tiêu chuẩn cộng đồng và muốn Báo cáo?');" class=" col-border--none color-red">Báo cáo vi phạm</button>
                                                        <a/>
                                                        @endif
                                                    </div>
                                                    <div class="comment-content">
                                                        {{$row_comment_branch->comment_content}}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        @endforeach

                                    </ul>
                                    <script>
                $(document).ready(function() {
                    $('#form_comment_branch{{$cmt->comment_id}}').submit(function(event) {
                        event.preventDefault();
                        var comment = $('#comment_contentt').val();
                        var post_id = $('#post_id').val();
                       
                        $.ajax({
                            url: "{{url('comment/create_comment_branch')}}/{{$cmt->comment_id}}",
                            cache: false,
                            type: "post",
                            data: {
                                comment: comment,
                                post_id: post_id,
                                "_token": '{{ csrf_token() }}'
                            },
                            success: function(data) {                             
                                 $('#comment_contentt').val("");                     
                                 $('#comment_view').load("{{url('comment/comment_view')}}/{{$post->post_id}}"); 
                            },
                           
                        })

                    })
                   
                
                });
               
                </script>
                                    @if (Auth::check())
                                    <div class="bl" id="bl{{$cmt->comment_id}}"> 
                                       <div style="margin-left:40px; box-sizing: border-box;">
                                            <form   id="form_comment_branch{{$cmt->comment_id}}" action="{{url('comment/create_comment_branch')}}/{{$cmt->comment_id}}" method="post">
                                                @csrf                                                   
                                                        <input id="comment_contentt" name="comment_contentt" class="input" placeholder="Nhập bình luận..." />
                                                        <input id="post_id" type=hidden name="post_id" value="{{$post->post_id}}" />
                                                        <span class="text-danger"><b id="review"></b></span>
                                                        <button type="submit" class=" col-margin--top btn-submit btn-style"> Đăng bình luận</button>
                                               
                                            </form>
                                       </div>
                                    </div>
                                </li>
                                @endif
                                
                                @endforeach

                            </ul>

                        </div>