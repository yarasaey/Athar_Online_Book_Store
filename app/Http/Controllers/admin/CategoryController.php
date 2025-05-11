<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    // عرض قائمة الفئات
    public function index() {
        $categories = Category::latest()->paginate(10);
        return view('admin.category.list', compact('categories'));
    }

    // عرض نموذج إضافة فئة جديدة
    public function create() {
        return view('admin.category.create');
    }

    // تخزين فئة جديدة
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug',
            'status' => 'required|in:0,1',
        ]);
    
        if ($validator->passes()) {
            // إنشاء فئة جديدة وتخزين البيانات
            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->showhome = $request->showhome;
            $category->save();
    
            // إضافة رسالة نجاح في الجلسة
            $request->session()->flash('success', 'Category added successfully');
    
            // إرجاع استجابة JSON بالنجاح
            return response()->json([
                'status' => true,
                'redirect_url' => route('categories.index'),
                'message' => 'Category Added Successfully'
            ]);
        } else {
            // إرجاع الأخطاء إذا كانت المدخلات غير صحيحة
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // عرض نموذج تعديل فئة
    public function edit($categoryId, Request $request) {
        // البحث عن الفئة باستخدام الـ ID
        $category = Category::find($categoryId);
    
        // إذا لم يتم العثور على الفئة، يتم إعادة التوجيه إلى صفحة القائمة
        if (empty($category)) {
            return redirect()->route('categories.index');
        }
    
        // عرض نموذج التعديل مع بيانات الفئة
        return view('admin.category.edit', compact('category'));
    }

    // تحديث بيانات فئة
    public function update($categoryId, Request $request) {
        $category = Category::find($categoryId);
    
        if (empty($category)) {
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Category not found'
            ]);
        }
    
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => 'required|in:0,1'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    
        // If validation passes, update the category
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->showhome = $request->showhome;
        $category->save();
    
        // Flash success message
        $request->session()->flash('success', 'Category Updated successfully');
    
        // Return success response
        return response()->json([
            'status' => true,
            'redirect_url' => route('categories.index'),
            'message' => 'Category updated successfully'
        ]);
    }
public function destroy(Request $request, $id)
{
    $category = Category::find($id);
    if (!$category) {
        return redirect()->route('categories.index')->with('error', ' category not found');
        
    }

    $category->delete();

    return redirect()->route('categories.index')->with('success', 'category deleted successfully.');
}

}