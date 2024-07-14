@props([
	'link' => '#',
	'title' => '',
	'description' => ''
])

<a
	href="{{$link}}"
	target="_blank"
	{{$attributes->merge(['class' => 'scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500'])}}
>
	<div>
		<div class="flex items-center justify-center w-16 h-16 rounded-full bg-indigo-50 dark:bg-indigo-900/20">
			{{$slot}}
		</div>

		<h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{$title}}</h2>
		{{$subtitle ?? ''}}
		<p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
			{{$description}}
		</p>
	</div>
	<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center w-6 h-6 mx-6 shrink-0 stroke-indigo-500">
		<path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
	</svg>
</a>
