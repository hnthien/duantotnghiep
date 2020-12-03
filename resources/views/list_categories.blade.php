<div class="popular-post col-padding ">
    <h2>DANH MỤC</h2>
    <div class="row">
        <div class="col-12">
            <ul class="list-vertical list-category">
                @php
                $category = new App\Category();        
                $data_category = $category->where('category_branch',0)->get();                      
                @endphp
                @foreach($data_category as $row_category)
                <li>
                    <a href="{{url('/category/')}}/{{$row_category->category_slug}}/{{$row_category->category_id}}">
                        <i class="fas fa-angle-right"></i>{{$row_category->category_title}}                     
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

    </div>

</div>