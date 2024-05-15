<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        update a new News 
      </h2>
  </x-slot>

  <section class="text-gray-600 body-font overflow-hidden">
    <div class="w-full md:w-1/2 py-24 mx-auto">
     
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-200 text-red-800">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form
            action="{{ route('admin.tags.update',$tag->slug) }}"
            id="payment_form"
            method="post"
            enctype="multipart/form-data"
            class="bg-gray-100 p-4"
        >
            @csrf
            @method('put')
            
            <div class="mb-4 mx-2">
                <x-input-label for="name" value="tag name" />
                <x-text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    value="{{ $tag->name }}"
                    required />
            </div>

           
           
            <div class="mb-2 mx-2">
             
                <button type="submit" id="form_submit" class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0"> Continue</button>
            </div>
        </form>
    </div>
</section>
</x-app-layout>