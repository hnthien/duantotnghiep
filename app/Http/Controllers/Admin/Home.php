<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category as ModelsCategory;
use App\Models\Post;
use App\Models\Feedback;
use App\Models\Error;
use App\User;
use App\Models\Comment;
use App\Models\Comment_report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Carbon;
class Home extends Controller
{
    protected $role_user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->role_user = Auth::user()->role_user;
            if ($this->role_user == 0) {
                App::abort(404);
            }else{
                return $next($request);
            }
        });
    }

    public function index()
    {
       
        $feedback = Feedback::count();
        $comment = Comment::where('comment_branch',0)->count();
        $comment_report= Comment_report::count();
        $error = Error::count();
        $user_kd = User::where('role_user',1)->count();
        $user_nd = User::where('role_user',0)->count();
        $user_tg = User::where('role_user',2)->count();
        $user = User::count();
        $post_all =  Post::where('post_status',2)->count();
        $post =  Post::where('post_status',0)->orWhere('post_status', 3)->count();
       
        // show chartjs 12 months 
        $monthsData = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $datesData = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31];
        // tgian hiện tại
        $time = Carbon::now();
        // năm hiện tại
        $current_year = $time->year;
        $months = $time->month;
        $day = $time->toDateString();
        // foreach data 12 tháng
       foreach ($monthsData as $month) {
            // thêm tháng của năm hiện tại vào countMonth có số lượng bài viết
            $countMonth[] = Post::where('post_status',2)->whereYear('created_at', $current_year)->whereMonth('created_at', $month)->count();
        } 
        // foreach data 1 tháng
        foreach ($datesData as $date) {
            
            $countDate[] = Post::where('post_status',2)->whereMonth('created_at',$months)->whereDay('created_at',$date)->count();
        } 
        foreach ($monthsData as $month) {
            // thêm tháng của năm hiện tại vào countMonth có số lượng bài viết
            $countMonth_user[] = User::whereYear('created_at', $current_year)->whereMonth('created_at', $month)->count();
        }
        // tháng hiện tại = tháng hiện tại - 1 để tính tháng trước của tháng hiện tại
        $month_current = $time->month - 1;
        // tính số lượng bài viết của tháng hiện tại trừ số lượng bài viết của tháng trước
        $count_month_current = $countMonth[$month_current] - $countMonth[$month_current - 1];
        $count_month_current_user = $countMonth_user[$month_current] - $countMonth_user[$month_current - 1];
        return view('admin.index', compact( 'post','post_all','user_kd','user_nd','user_tg', 'user', 'feedback', 'error','comment','comment_report','countMonth', 'count_month_current','countMonth_user', 'count_month_current_user','countDate','months','day'));
 
 
    }
}
