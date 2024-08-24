@extends('layouts.landing')

@section('content')
<div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-[75vh]">
	<div
		class="absolute top-0 w-full h-full bg-center bg-cover"
		style="background-image: url('/assets/img/dashboard.png');"
	>
	  <span class="w-full h-full absolute opacity-90 bg-black"></span>
	</div>
	<div class="landing-container relative mx-auto">
		<div class="items-center flex flex-wrap">
			<div class="w-full px-4 flex flex-col items-center">
				<h1 class="text-white font-semibold text-center text-xl sm:text-2xl md:text-5xl my-8">
					First, PLAN Then DO
				</h1>
				<div class="flex flex-col sm:flex-row sm:space-x-24 text-slate-200 text-lg mb-8">
					<ul>
						<li class="py-1">
							<i class="fa fa-check text-success me-2"></i>
							<span>Multiple lists</span>
						</li>
						<li class="py-1">
							<i class="fa fa-check text-success me-2"></i>
							<span>No tracker cookies</span>
						</li>
						<li class="py-1">
							<i class="fa fa-check text-success me-2"></i>
							<span>Open source</span>
						</li>
					</ul>
					<ul>
						<li class="py-1">
							<i class="fa fa-check text-success me-2"></i>
							<span>Daily habits</span>
						</li>
						<li class="py-1">
							<i class="fa fa-check text-success me-2"></i>
							<span>No advertisement</span>
						</li>
						<li class="py-1">
							<i class="fa fa-check text-success me-2"></i>
							<span>Free to use</span>
						</li>
					</ul>
				</div>
				<a href="@auth {{route('todo-list')}} @else {{route('login')}} @endauth">
					<x-button class="shadow-xl px-6 py-3 uppercase">build a to-do</x-button>
				</a>
			</div>
		</div>
	</div>
	<div
		class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-20 flex items-end"
	>
		<svg
			class="h-full"
			xmlns="http://www.w3.org/2000/svg"
			preserveAspectRatio="none"
			version="1.1"
			viewBox="0 0 2560 100"
			x="0"
			y="0"
		>
			<polygon
				class="text-slate-200 fill-current"
				points="2560 0 2560 100 0 100"
			></polygon>
		</svg>
	</div>
</div>
<section class="pb-20 bg-slate-200 -mt-24">
	<div class="landing-container mx-auto px-4">
		<div class="flex flex-wrap">
			<div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
				<div
					class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
				>
					<div class="px-4 py-5 flex-auto">
						<div
							class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400"
						>
							<i class="fas fa-redo"></i>
						</div>
						<h6 class="text-xl font-semibold">Updates Are Coming</h6>
						<p class="mt-2 mb-4 text-slate-500">
							New features will be released over time. Remember to check out the project sometimes.
						</p>
					</div>
				</div>
			</div>
			<div class="w-full md:w-4/12 px-4 text-center">
				<div
					class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
				>
					<div class="px-4 py-5 flex-auto">
						<div
							class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-sky-400"
						>
							<i class="fas fa-code-branch"></i>
						</div>
						<h6 class="text-xl font-semibold">Open Source</h6>
						<p class="mt-2 mb-4 text-slate-500">
							An educational open source to-do list powered by Livewire. Checkout the
							<a
								href="https://github.com/Farshad-Hasanpour/tall-learning"
								target="_bland"
								rel="noopener"
								class="text-pink-600"
							>repository</a>.
						</p>
					</div>
				</div>
			</div>
			<div class="pt-6 w-full md:w-4/12 px-4 text-center">
				<div
					class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
				>
					<div class="px-4 py-5 flex-auto">
						<div
							class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-emerald-400"
						>
							<i class="fas fa-fingerprint"></i>
						</div>
						<h6 class="text-xl font-semibold">No Permission Required</h6>
						<p class="mt-2 mb-4 text-slate-500">
							You are not prompted to accept tracker cookies! Use the application and enjoy!
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="flex flex-wrap items-center mt-32">
			<div class="w-full md:w-5/12 px-4 mr-auto ml-auto mb-4">
				<div
					class="text-slate-500 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-white"
				>
					<i class="fas fa-user-friends text-xl"></i>
				</div>
				<h3 class="text-3xl mb-2 font-semibold leading-normal">
					Technical Details
				</h3>
				<p
					class="text-lg font-light leading-relaxed mt-4 mb-4 text-slate-600"
				>
					This to-list is powered by the TALL stack. It means Tailwind, Alpine.js, Livewire, and Laravel. The project is open source, and it's made primarily for educational purposes.
				</p>
				<p
					class="text-lg font-light leading-relaxed mt-4 mb-4 text-slate-600"
				>
					You can register, create multiple to-do lists, set the tasks to reset daily, and much more...
				</p>
				<a
					href="{{route('register')}}"
					target="_bland"
					rel="noopener"
					class="font-bold text-pink-600 mt-8"
				>Register and see for yourself!</a
				>
			</div>
			<div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
				<div
					class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-pink-500"
				>
					<img
						alt=""
						src="/assets/img/community.jpg"
						class="w-full align-middle rounded-t-lg"
					/>
					<blockquote class="relative p-8 mb-4">
						<svg
							preserveAspectRatio="none"
							xmlns="http://www.w3.org/2000/svg"
							viewBox="0 0 583 95"
							class="absolute left-0 w-full block h-[95px] top-[-94px]"
						>
							<polygon
								points="-30,95 583,95 583,65"
								class="text-pink-500 fill-current"
							></polygon>
						</svg>
						<h4 class="text-xl font-bold text-white">
							Fun Fact!
						</h4>
						<p class="text-md font-light mt-2 text-white">
							Did you know there are more than 1 million public Github repositories of to-do lists?
						</p>
						<p class="text-md font-light mt-2 text-white">
							Each made by someone unique!
						</p>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="relative py-20">
	<div
		class="bottom-0 top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20 flex items-end"
	>
		<svg
			class="w-full h-full"
			xmlns="http://www.w3.org/2000/svg"
			preserveAspectRatio="none"
			version="1.1"
			viewBox="0 0 2560 100"
			x="0"
			y="0"
		>
			<polygon
				class="text-white fill-current"
				points="2560 0 2560 100 0 100"
			></polygon>
		</svg>
	</div>
	<div class="landing-container mx-auto px-4">
		<div class="items-center flex flex-wrap">
			<div class="w-full md:w-4/12 ml-auto mr-auto px-4">
				<img
					alt=""
					class="max-w-full rounded-lg shadow-lg"
					src="/assets/img/contact-me.jpg"
				/>
			</div>
			<div class="w-full md:w-5/12 ml-auto mr-auto px-4">
				<div class="md:pr-12">
					<div
						class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 my-6 shadow-lg rounded-full bg-pink-300"
					>
						<i class="fas fa-question text-xl"></i>
					</div>
					<h3 class="text-3xl font-semibold">Having any question?</h3>
					<p class="mt-4 text-lg leading-relaxed text-slate-500">
						Please contact me if you need any explanation, have a suggestion,
						or have anything else to say.
					</p>
					<ul class="list-none mt-6">
						<li class="py-2">
							<div class="flex items-center">
								<span
									class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
								>
									<i class="far fa-envelope"></i>
								</span>
								<a class="text-slate-500" href="mailto:farshad.hasanpour96@gmail.com">
									farshad.hasanpour96@gmail.com
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="pt-20 pb-48">
	<div class="landing-container mx-auto px-4">
		<div class="flex flex-wrap justify-center text-center mb-24">
			<div class="w-full lg:w-6/12 px-4">
				<h2 class="text-4xl font-semibold">About me?</h2>
				<p class="text-lg leading-relaxed m-4 text-slate-500">
					I am a front-end web developer familiar with databases, backend frameworks, Python, and neural networks. I put most of my attention on JS language and continuously learn new related technologies. This to-do list is one of my projects to get more into the details of full-stack web development.
				</p>
			</div>
		</div>
		<div class="flex flex-wrap justify-center">
			<div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
				<div class="px-6">
					<img
						alt=""
						src="/assets/img/me.png"
						class="shadow-lg rounded-full mx-auto max-w-[120px]"
					/>
					<div class="pt-6 text-center">
						<h5 class="text-xl font-bold">Farshad Hasanpour</h5>
						<p
							class="mt-1 text-sm text-slate-400 uppercase font-semibold"
						>
							Developer
						</p>
						<div class="box-center mt-6 space-x-2">
							<a
								href="https://www.linkedin.com/in/farshad-hasanpour/"
								target="_blank"
								rel="noopener"
							>
								<button
									class="box-center bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none"
									type="button"
								>
									<i class="fab fa-linkedin"></i>
								</button>
							</a>

							<a
								href="https://x.com/F_Hasanpour"
								target="_blank"
								rel="noopener"
							>
								<button
									class="box-center bg-black text-white w-8 h-8 rounded-full outline-none focus:outline-none"
									type="button"
								>
									<x-icons.twitter class="w-4 h-4" />
								</button>
							</a>
							<a
								href="https://github.com/Farshad-Hasanpour/"
								target="_blank"
								rel="noopener"
							>
								<button
									class="box-center bg-slate-700 text-white w-8 h-8 rounded-full outline-none focus:outline-none"
									type="button"
								>
									<i class="fab fa-github"></i>
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="pb-20 relative block bg-slate-800">
	<div
		class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20 flex items-end"
	>
		<svg
			class="h-full"
			xmlns="http://www.w3.org/2000/svg"
			preserveAspectRatio="none"
			version="1.1"
			viewBox="0 0 2560 100"
			x="0"
			y="0"
		>
			<polygon
				class="text-slate-800 fill-current"
				points="2560 0 2560 100 0 100"
			></polygon>
		</svg>
	</div>
	<div class="landing-container mx-auto px-4 lg:pt-24 lg:pb-24">
		<div class="flex flex-wrap text-center justify-center">
			<div class="w-full lg:w-6/12 px-4">
				<h2 class="text-4xl font-semibold text-white">Plan your time</h2>
				<p class="text-lg leading-relaxed mt-4 mb-4 text-slate-400">
					Using this to-do list is easy!
				</p>
			</div>
		</div>
		<div class="flex flex-wrap mt-12 justify-center">
			<div class="w-full lg:w-3/12 px-4 text-center">
				<div
					class="text-slate-800 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
				>
					<i class="fa fa-solid fa-list text-xl"></i>
				</div>
				<h6 class="text-xl mt-5 font-semibold text-white">
					Create a to-do list
				</h6>
				<p class="mt-2 mb-4 text-slate-400">
					Each to-do list has its tasks. You can manage your tasks in various lists.
				</p>
			</div>
			<div class="w-full lg:w-3/12 px-4 text-center">
				<div
					class="text-slate-800 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
				>
					<i class="fas fa-poll text-xl"></i>
				</div>
				<h5 class="text-xl mt-5 font-semibold text-white">
					Create a task
				</h5>
				<p class="mt-2 mb-4 text-slate-400">
					Inside each to-do list, you can create multiple tasks. You can even set them to reset daily.
				</p>
			</div>
			<div class="w-full lg:w-3/12 px-4 text-center">
				<div
					class="text-slate-800 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
				>
					<i class="fa fa-regular fa-clock text-xl"></i>
				</div>
				<h5 class="text-xl mt-5 font-semibold text-white">Make your day perfect</h5>
				<p class="mt-2 mb-4 text-slate-400">
					They say the key to happiness is to be in control of your time!
					Complete tasks and track your progress.
				</p>
			</div>
		</div>
	</div>
</section>
@endsection
