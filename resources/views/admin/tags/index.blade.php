<x-app-layout>
  <section class="text-gray-600 body-font overflow-hidden">
      <div class="container px-5 py-12 mx-auto">
          <div class="mb-12 flex items-center">
              <h2 class="text-2xl font-medium text-gray-900 title-font px-4">
                العلامات({{ $tags->count() }})
              </h2>
            
          </div>
          <div class="-my-6">
              @foreach($tags as $tag)
                  <div
                   
                      class="py-6 px-4 flex flex-wrap md:flex-nowrap border-b border-gray-100 "
                  >
                    
                      <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                          <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $tag->name }}</h2>
                         
                      </div>
                    
                      <span class="md:flex-grow flex flex-col items-end justify-center">
                        <div>

                        </div>
                        <a href="{{route('admin.tags.edit',$tag->slug)}}" class="btn btn-primary"> <i class="bi bi-pencil-square"></i>تعديل</a>
                        <form action="{{route('admin.tags.destroy',$tag->slug)}}" method="post">
                          @csrf
                          @method('delete')
                          <button  onclick="return confirm('هل متاكد من المسح')"  class="btn btn-danger" type="submit">مسح</button>
                      </form>
                      </span>
                  </div>
              @endforeach
          </div>
      </div>
  </section>
</x-app-layout>