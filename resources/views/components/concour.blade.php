 @props(['concour'])


 <aside id="sidebarimg" class=" overflow-y-auto lg:border-l lg:border-gray-600 bg-concgreen-600 p-8 ">

     <div class="space-y-6 pb-16">
         <div>
             <div class="aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg">
                 <img id="thesidebarimg" src="{{ asset('storage/' . $concour->image) }}" alt=""
                     class="object-cover" />
             </div>
             <div class="mt-4 flex items-start justify-between">
                 <div>
                     <h2 id="sideimgname" class="text-lg font-medium text-white"><span class="sr-only">Details for
                         </span>
                         {{ $concour->profession }}
                     </h2>
                 </div>


                 {{-- start like --}}

                 @if ($concour->user_id !== Auth::user()->id)
                     @if ($concour->liked())
                         @csrf
                         <form action="{{ route('unlike.concour', $concour->id) }}" method="post">
                             @csrf

                             <button type="submit"
                                 class="inline-flex justify-end items-end space-x-2 text-red-600 hover:text-red-800">
                                 <!-- Heroicon name: solid/thumb-up -->
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                     class="w-6 h-6">
                                     <path
                                         d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                 </svg>


                                 <span class="font-medium text-white">{{ $concour->likeCount }}</span>
                                 <span class="sr-only">likes</span>
                             </button>
                         </form>
                     @else
                         <form action="{{ route('like.concour', $concour->id) }}" method="post">
                             @csrf

                             <button type="submit"
                                 class="inline-flex justify-end items-end space-x-2 text-white hover:text-red-800">
                                 <!-- Heroicon name: solid/thumb-up -->
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                     <path stroke-linecap="round" stroke-linejoin="round"
                                         d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                 </svg>

                                 <span class="font-medium text-red-600">{{ $concour->likeCount }}</span>
                                 <span class="sr-only">likes</span>
                             </button>
             </div>
             @endif
         @else
             <span type="submit" class="inline-flex justify-end items-end space-x-2 text-red-600 hover:text-gray-500">
                 <!-- Heroicon name: solid/thumb-up -->
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                     <path
                         d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                 </svg>

                 <span class="font-medium text-red-600">{{ $concour->likeCount }}</span>
                 <span class="sr-only">likes</span>
             </span>
             @endif
             {{-- end like --}}





         </div>
     </div>
     <div>
         <h3 class="font-medium text-white">Informations</h3>
         <dl class="mt-2 divide-y divide-gray-200 border-b border-t border-gray-600">
             <div class="flex justify-between py-3 text-sm font-medium">
                 <dt class="text-white">Téléchargé par</dt>
                 <dd id="username" class="text-white">
                     {{ $concour->user->name }}
                 </dd>
             </div>

             <div class="flex justify-between py-3 text-sm font-medium">
                 <dt class="text-white">Créé à</dt>
                 <dd id="createdat" class="text-white">
                     {{ $concour->created_at->diffForHumans() }}
                 </dd>

             </div>

             <div class="flex justify-between py-3 text-sm font-medium">
                 <dt class="text-white">Dernière modification</dt>
                 <dd id="updatedat" class="text-white">
                     {{ $concour->updated_at->diffForHumans() }}

                 </dd>
             </div>


         </dl>
     </div>
     {{--      <div>
         <h3 class="font-medium text-white">Description</h3>
         <div class="mt-2 flex items-center justify-between">
             <p class="text-sm italic text-white">Add a description to this image.</p>
             <button type="button"
                 class="flex h-8 w-8 items-center justify-center rounded-full bg-concgreen-600 text-gray-400 hover:bg-gray-100 hover:text-white focus:outline-none focus:ring-2 focus:ring-bittersweet-500">
                 <!-- Heroicon name: solid/pencil -->
                 <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                     aria-hidden="true">
                     <path
                         d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                 </svg>
                 <span class="sr-only">Add description</span>
             </button>
         </div>
     </div> --}}
     <div>
         <h3 class="font-medium text-white mt-5">Partagé avec</h3>
         <ul role="list" class="mt-2 divide-y divide-gray-200 border-b border-t border-gray-600">
             <li class="flex items-center justify-between py-3">
                 <div class="flex items-center">
                     @if ($concour->user->avatar)
                         <img src="{{ asset('storage/' . $concour->user->avatar) }}" class="h-8 w-8 rounded-full"
                             alt="" />
                     @else
                         <img class="h-8 w-8 rounded-full" src="{{ URL('image/profileplaceholder.jpg') }}"
                             alt="1" alt="" />
                     @endif
                     <p id="sharedwithusername" class="ml-4 text-sm font-medium text-white">
                         {{ $concour->user->name }}
                     </p>
                 </div>
             </li>
         </ul>
     </div>
     </div>
 </aside>
