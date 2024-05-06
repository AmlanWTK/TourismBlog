<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\CategoryModel;
use App\Models\PageModel;
use App\Models\BlogCommentModel;
use App\Models\BlogCommentReplyModel;
use App\Mail\ContactMail;
use Auth;
use Mail;

class HomeController extends Controller
{ public function home()
    {
    $getPage = PageModel::getSlug('home');
    $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : 'Colors';
    $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
    $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
    return view ('home', $data);
}

public function about()
{
    $getPage = PageModel::getSlug('about');
    $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : 'About';
    $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
    $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
    return view ('about', $data);
}

public function teams()
{
    $getPage = PageModel::getSlug('teams');
    $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : 'Teams';
    $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
    $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
    return view ('teams', $data);
}

public function gallery(){
    $getPage = PageModel::getSlug('gallery');
    $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : 'Gallery';
    $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
    $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
    return view ('gallery', $data);
}

public function blog(){
   
    $data['getRecord'] = BlogModel::getRecordFront();
    return view ('blog', $data);
}

public function blogdetail($slug)
{

    $getCategory = CategoryModel::getSlug($slug);
    if(!empty($getCategory))
    {
        $data['meta_title'] = $getCategory->meta_title;
        $data['meta_description'] = $getCategory->meta_description;
        $data['meta_keywords'] = $getCategory->meta_keywords;
        $data['header_title'] = $getCategory->title;
        $data['getRecord'] = BlogModel::getRecordFrontCategory($getCategory->id);
        return view ('blog', $data);
    }
    else
    {
        $getRecord = BlogModel::getRecordSlug($slug);
        if(!empty($getRecord)){
            $data['getCategory'] = CategoryModel::getCategory();
            $data['getRecentPost'] = BlogModel::getRecentPost();
            $data['getRelatedPost'] = BlogModel::getRelatedPost($getRecord->category_id, $getRecord->id);
            $data['getRecord'] = $getRecord;

            $data['meta_title'] = $getRecord->title;
            $data['meta_description'] = $getRecord->meta_description;
            $data['meta_keywords'] = $getRecord->meta_keywords;
            return view ('blog_detail', $data);
        }
        else{
            abort(404);
        }
    }
}

public function BlogCommentReplySubmit(Request $request)
{
    $save = new BlogCommentReplyModel;
    $save->user_id = Auth::user()->id;
    $save->comment_id = $request->comment_id;
    $save->comment = $request->comment;
    $save->save();

    return redirect()->back()->with('success', "Thanks for your reply.");
}


public function BlogCommentSubmit(Request $request)
{
    $save = new BlogCommentModel;
    $save->user_id = Auth::user()->id;
    $save->blog_id = $request->blog_id;
    $save->comment = $request->comment;
    $save->save();

    return redirect()->back()->with('success', "Thanks for your reply.");
}
public function contact(){
    $getPage = PageModel::getSlug('contact');
    $data['meta_title'] = !empty($getPage) ? $getPage->meta_title : 'Tourism';
    $data['meta_description'] = !empty($getPage) ? $getPage->meta_description : '';
    $data['meta_keywords'] = !empty($getPage) ? $getPage->meta_keywords : '';
    return view ('contact', $data);
}

public function contact_mail_send(Request $request)
{

    Mail::to('amlansarkar738@gmail.com')->send(new ContactMail($request));
    return redirect('contact');

}


}