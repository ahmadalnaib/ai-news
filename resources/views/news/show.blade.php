<x-guest-layout>



@section('title', $news->title)
@section('og-title', $news->title)
@section('og-type', 'article')
@section('og-url', url()->current())
@section('og-image','/storage/'. $news->image)
@section('og-description',  $news->title)
@section('description',  $news->title)
@section('keywords', implode(', ', explode(' ', $news->title)))
@section('twitter:card', url('/storage/'. $news->image))
@section('twitter:site', '@Ahmad_Al_Naib')
@section('twitter:title', $news->title)
@section('twitter:description', $news->title)
@section('twitter:image', url('/storage/'. $news->image))

  


    <section class="text-gray-600 body-font overflow-hidden" dir="rtl">
        <div class="container px-5 py-24 mx-auto">
            <div class="mb-12 text-right">
                <h2 class="text-2xl font-medium text-gray-900 title-font">
                    {{ $news->title }}
                </h2>
                <div class="md:flex-grow mr-8 mt-2 flex items-center justify-end">
                    @foreach($news->tags as $tag)
                        <span class="inline-block ml-2 tracking-wide text-black text-xs font-medium title-font py-0.5 px-1.5 border border-black uppercase">{{ $tag->name }}</span>
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
                          
                        </p>
                        <a target="__blank" href="{{$news->link}}" class="block text-center my-4 tracking-wide bg-white text-black text-sm font-medium title-font py-2 border border-black hover:bg-black hover:text-white uppercase">زيارة موقع الشركة </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </x-guest-layout>