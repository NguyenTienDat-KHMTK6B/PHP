<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        // Lấy tất cả sản phẩm từ bảng tbl_product
        $products = ProductModel::all();

        // Chuyển dữ liệu qua view và trả về view user.home.blade.php với dữ liệu sản phẩm
        return view('user.home', ['products' => $products]);
    }

        public function shopcart()
    {
        $products = ProductModel::all();
        $categories = CategoryModel::all();

        return view('user.shopcart', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function categories()
    {
        $categories = CategoryModel::all();
        $products = ProductModel::all();

        return view('user.shopcart', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function categoryProducts($category_id)
    {
        // Truy vấn các sản phẩm thuộc categories được chọn
        $categoryProducts = ProductModel::where('category_id', $category_id)->get();
    
        // Truy vấn tất cả các hãng máy tính từ bảng tbl_categories
        $categories = CategoryModel::all();
    
        // Trả về view với danh sách sản phẩm thuộc categories được chọn và danh sách categories
        return view('user.shopcart', ['products' => $categoryProducts, 'categories' => $categories]);
    }
    

    public function search(Request $request){
        $keyword = $request->input('keyword');

        // Tìm kiếm sản phẩm dựa trên từ khóa
        $products = ProductModel::where('title', 'like', "%$keyword%")->get();

        // Trả về view user.shopcart với kết quả tìm kiếm
        return view('user.shopcart', ['products' => $products]);
    }
    public function productdetails($id)
    {
        // Tìm sản phẩm trong CSDL dựa trên ID
        $products = ProductModel::findOrFail($id);
        
        // Trả về view của trang chi tiết sản phẩm và truyền sản phẩm tìm được
        return view('user.productdetails', ['product' => $products]);
    }

    public function showLoginForm()
    {
        return view('user.showLoginForm');
    }

    public function login(Request $request)
    {
        // Validate the input
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the intended route or home
            return redirect()->intended('/');
        }

        // Authentication failed, redirect back to login with an error message
        return redirect()->route('user.login')->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }

    
}
