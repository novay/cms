<?php 

namespace Novay\CMS\Traits;

use ProtoneMedia\Splade\Facades\Splade;
use Illuminate\Http\Request;

trait ControllerTrait
{
    public function index(Request $request)
    {
        $table = Splade::onLazy(fn () => $this->table);

        return view("{$this->view}.index", compact('table'));
    }

    public function create(Request $request)
    {
        return view("{$this->view}.create", [
            'subtitle' => __('Tambah')
        ]);
    }

    public function store(Request $request)
    {
        $input = $this->rules($request);
        $input = $this->customStore($request, $input);

        $simpan = $this->data->create($input);
        $this->saved($request, $simpan);

        Splade::toast(__("{$this->title} berhasil dibuat!"));
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $edit = $this->data->findOrFail($id);
        $edit = $this->append($request, $edit);
        
        return view("{$this->view}.edit", [
            'subtitle' => __('Sunting'), 
            'edit' => $edit
        ]);
    }

    public function update(Request $request, $id)
    {
        $edit = $this->data->findOrFail($id);
        $input = $this->rules($request, $edit);
        $input = $this->customEdit($request, $input, $edit);
        
        $edit->update($input);
        $this->saved($request, $edit);

        Splade::toast(__("{$this->title} berhasil diperbarui!"));
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $data = $this->data->findOrFail($id);
        $this->customDelete($request, $id);
        $data->delete();

        Splade::toast(__("{$this->title} berhasil dihapus!"));
        return redirect()->back();
    }

    public function customStore($request, $input) { return $input; }
    public function customEdit($request, $input, $edit) { return $input; }
    public function customDelete($request, $id) {}
    public function saved($request, $data) {}
    public function append($request, $data) { return $data; }
}
