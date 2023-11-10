<?php 
namespace App\Models;

class Page
{
public static function find($slug)
{
    $path = resource_path("pages/$slug.html");
    // $path = __DIR__."/../resources/pages/$slug.html";
    if (!file_exists($path)){
        return redirect('/'); //redirect home page which is pages page.
        // abort(404);//displays 404 not found error
    }
    return cache()->remember("posts.$slug", now()->addSeconds(5), function() use ($path){
        var_dump('file-get-contents');
        return file_get_contents($path);
    });
}
}
?>