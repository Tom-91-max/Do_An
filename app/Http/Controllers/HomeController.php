<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Favorite;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $topBanner = Banner::getBanner()->first();
        $gallerys = Banner::getBanner('gallery')->get();

        $news_products = Product::orderBy('created_at', 'DESC')->limit(2)->get();
        $sale_products = Product::orderBy('created_at', 'DESC')->where('sale_price','>', 0)->limit(3)->get();
        $feature_products = Product::inRandomOrder()->limit(4)->get();
        $lastest_news = Blog::orderBy('created_at', 'DESC')->limit(3)->get();
        // dd ($news_products);
        return view('home.index', compact('topBanner','gallerys','news_products','sale_products','feature_products', 'lastest_news'));
    }
    public function category (Category $cat)   {
        $products = Product::paginate(9);
       // dd($cat);
        if($cat->id){
            $products = $cat->products()->paginate(9);
        }
        $news_products = Product::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('home.category', compact('cat','products','news_products'));
    }

    public function product (Product $product)  {
        $related_prd = Product::paginate();
        $products = Product::where('category_id', $product->category_id)->limit(12)->get();
        return view('home.product', compact('product','products', 'related_prd')); 
    }
    public function favorite ($product_id)  {
        $data = [
            'product_id' => $product_id,
            'customer_id' => auth('cus')->id()
        ];

        $favorited = Favorite::where(['product_id' => $product_id, 'customer_id' => auth('cus')->id()])->first();
        if($favorited) {
            $favorited->delete();
            return redirect()->back()-> with('ok','Bạn đã bỏ yêu thích sản phẩm');

        } else {
            Favorite::create($data);
            return redirect()->back()-> with('ok','Bạn đã yêu thích sản phẩm');
        }

    }

    public function contact() {
        return view('home.contact');
    }
    public function post_contact(Request $request) {
        $request->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100',
            'subject' => 'required|min:4',
            'message' => 'required|min:4'
        ]);
        $data = $request->all('name', 'email', 'subject', 'message');

        if (Contact::create($data)) {
            return redirect()->route('home.contact')->with('ok','Contact successfully, please wait for a response from us !!');
        }else{
            return redirect()->back()->with('no','Something error, Please try again');
        }

        return view('home.contact');
    }
    public function our_blog() {
        $blogs = Blog::paginate();
        return view('home.our_blog', compact('blogs'));
    }
    public function blog_details(Blog $blog) {
        $comments = Comment::where('blog_id', $blog->id)->orderBy('id', 'DESC')->get();
        return view('home.blog_details', compact('blog','comments'));
    }
    public function services_details() {
        return view('home.services_details');
    }
    public function services() {
        return view('home.services');
    }
    public function team_details() {
        return view('home.team_details');
    }

    public function post_comment ($BolgId) {
        $data = request()->all('comment');
        $data['blog_id'] = $BolgId;
        $data['customer_id'] = auth('cus')->id();
        if (Comment::create($data)) {
            return redirect()->back();
        }
        return redirect()->back();
    }
//

public function delete_comment($id) {
    $comment = Comment::find($id);

    if ($comment) {
        $comment->delete();
    }

    return redirect()->back();
}

public function edit_comment($id) {
    $comment = Comment::find($id);
    
    if ($comment) {
        return view('home.edit_comment', compact('comment'));
    }

    return redirect()->back();
}

public function update_comment(Request $request, $id) {
    $comment = Comment::find($id);

    if ($comment) {
        $comment->comment = $request->input('comment');
        $comment->save();
    }

    return redirect()->route('home.blog_details', ['blog' => $comment->blog_id]);
}


}
