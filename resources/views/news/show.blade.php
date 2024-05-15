<x-guest-layout>
    <section class="text-gray-600 body-font overflow-hidden" dir="rtl">
        <div class="container px-5 py-24 mx-auto">
            <div class="mb-12 text-right">
                <h2 class="text-2xl font-medium text-gray-900 title-font">
                    {{ $news->title }}
                </h2>
                <div class="md:flex-grow mr-8 mt-2 flex items-center justify-end">
                    @foreach($news->tags as $tag)
                        <span class="inline-block ml-2 tracking-wide text-indigo-500 text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="-my-6">
                <div class="flex flex-wrap md:flex-nowrap">
                    <div class="content w-full md:w-3/4 pl-4 leading-relaxed text-base text-right">
                        {!! $news->description !!}
                    </div>
                    <div class="w-full md:w-1/4 pr-4">
                        <img
                            src="/storage/{{ $news->image }}"
                            alt=" logo"
                            class="max-w-full mb-4"
                        >
                        <p class="leading-relaxed text-base text-right">
                            <strong>الموقع: </strong>{{ $news->location }}<br>
                            <strong>الشركة: </strong>{{ $news->company }}
                        </p>
                        <a href="#" class="block text-center my-4 tracking-wide bg-white text-indigo-500 text-sm font-medium title-font py-2 border border-indigo-500 hover:bg-indigo-500 hover:text-white uppercase">تقدم الآن</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </x-guest-layout>