@extends('layouts.landing')

@section('content')
<!--====== NAVBAR NINE PART START ======-->
<nav
	x-data="{showSidebar: false}"
	class="text-slate-700 antialiased top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg"
>
	<div class="landing-container px-4 mx-auto flex flex-wrap items-center justify-between">
		<div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
			<a
				class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
				href="{{route('home')}}"
			>What To Do</a>
			<button
				type="button"
				class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
				@click="showSidebar = !showSidebar"
			>
				<i class="text-white fas fa-bars"></i>
			</button>
		</div>
		<div
			class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 rounded-md lg:rounded-none shadow-xl lg:shadow-none"
			:class="showSidebar ? 'block' : 'hidden'"
		>
			<ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
				<li class="flex items-center">
					<a
						class="lg:text-white lg:hover:text-slate-200 text-slate-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
						href="https://www.linkedin.com/in/farshad-hasanpour/"
						target="_blank"
						rel="noopener"
					>
						<i
							class="lg:text-slate-200 text-slate-400 fab fa-linkedin text-lg leading-lg"
						></i>
						<span class="lg:hidden inline-block ml-2">Linkedin</span>
					</a>
				</li>
				<li class="flex items-center">
					<a
						class="lg:text-white lg:hover:text-slate-200 text-slate-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
						href="https://x.com/F_Hasanpour"
						target="_blank"
						rel="noopener"
					>
						<i
							class="lg:text-slate-200 text-slate-400 fab fa-twitter text-lg leading-lg"
						></i>
						<span class="lg:hidden inline-block ml-2">X platform</span>
					</a>
				</li>
				<li class="flex items-center">
					<a
						class="lg:text-white lg:hover:text-slate-200 text-slate-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
						href="https://github.com/Farshad-Hasanpour/tall-learning"
						target="_blank"
						rel="noopener"
					>
						<i
							class="lg:text-slate-200 text-slate-400 fab fa-github text-lg leading-lg"
						></i>
						<span class="lg:hidden inline-block ml-2">Github</span>
					</a>
				</li>
				@auth
					<li class="flex items-center lg:ms-6">
						<form
							action="{{ route('logout') }}"
							method="POST"
							class="inline-block"
						>
							@csrf
							<button
								type="submit"
								class="lg:text-white lg:hover:text-slate-200 text-slate-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
							>Logout</button>
						</form>
					</li>
					<li>
						<a href="{{ route('todo-list') }}">
							<button
								class="bg-white text-slate-700 active:bg-slate-50 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
								type="button"
							>
								Dashboard
							</button>
						</a>
					</li>
				@else
					<li class="flex items-center lg:ms-6">
						<a
							class="lg:text-white lg:hover:text-slate-200 text-slate-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
							href="{{ route('login') }}"
						>
							Login
						</a>
					</li>
					<li class="flex lg:hidden items-center">
						<a
							class="lg:text-white lg:hover:text-slate-200 text-slate-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
							href="{{ route('register') }}"
						>
							Register
						</a>
					</li>
					<li class="hidden lg:flex items-center">
						<a href="{{ route('register') }}">
							<button
								class="bg-white text-slate-700 active:bg-slate-50 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
								type="button"
							>
								Register
							</button>
						</a>
					</li>
				@endauth
			</ul>
		</div>
	</div>
</nav>

<main class="text-slate-700 antialiased">
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
			class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-[70px] flex items-end"
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
				<div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
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
							class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300"
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
		<div class="landing-container mx-auto px-4 lg:pt-24 lg:pb-64">
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
</main>
<footer class="antialiased relative bg-slate-200 pt-8 pb-6">
	<div
		class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20 flex items-end"
		style="transform: translateZ(0px)"
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
	<div class="landing-container mx-auto px-4">
		<div class="flex flex-wrap text-center lg:text-left">
			<div class="w-full lg:w-6/12 px-4">
				<h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
				<h5 class="text-lg mt-0 mb-2 text-slate-600">
					Find us on any of these platforms, we respond 1-2 business days.
				</h5>
				<div class="mt-6 lg:mb-0 mb-6">
					<button
						class="bg-white text-sky-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
						type="button"
					>
						<i class="fab fa-twitter"></i></button
					><button
						class="bg-white text-sky-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
						type="button"
					>
						<i class="fab fa-facebook-square"></i></button
					><button
						class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
						type="button"
					>
						<i class="fab fa-dribbble"></i></button
					><button
						class="bg-white text-slate-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
						type="button"
					>
						<i class="fab fa-github"></i>
					</button>
				</div>
			</div>
			<div class="w-full lg:w-6/12 px-4">
				<div class="flex flex-wrap items-top mb-6">
					<div class="w-full lg:w-4/12 px-4 ml-auto">
                <span
					class="block uppercase text-slate-500 text-sm font-semibold mb-2"
				>Useful Links</span
				>
						<ul class="list-unstyled">
							<li>
								<a
									class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
									href="https://www.creative-tim.com/presentation?ref=njs-landing"
								>About Us</a
								>
							</li>
							<li>
								<a
									class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
									href="https://blog.creative-tim.com?ref=njs-landing"
								>Blog</a
								>
							</li>
							<li>
								<a
									class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
									href="https://www.github.com/creativetimofficial?ref=njs-landing"
								>Github</a
								>
							</li>
							<li>
								<a
									class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
									href="https://www.creative-tim.com/bootstrap-themes/free?ref=njs-landing"
								>Free Products</a
								>
							</li>
						</ul>
					</div>
					<div class="w-full lg:w-4/12 px-4">
                <span
					class="block uppercase text-slate-500 text-sm font-semibold mb-2"
				>Other Resources</span
				>
						<ul class="list-unstyled">
							<li>
								<a
									class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
									href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-landing"
								>MIT License</a
								>
							</li>
							<li>
								<a
									class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
									href="https://creative-tim.com/terms?ref=njs-landing"
								>Terms &amp; Conditions</a
								>
							</li>
							<li>
								<a
									class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
									href="https://creative-tim.com/privacy?ref=njs-landing"
								>Privacy Policy</a
								>
							</li>
							<li>
								<a
									class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
									href="https://creative-tim.com/contact-us?ref=njs-landing"
								>Contact Us</a
								>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr class="my-6 border-slate-300" />
		<div
			class="flex flex-wrap items-center md:justify-between justify-center"
		>
			<div class="w-full md:w-4/12 px-4 mx-auto text-center">
				<div class="text-sm text-slate-500 font-semibold py-1">
					Copyright © <span id="get-current-year"></span> Notus Tailwind JS
					by
					<a
						href="https://www.creative-tim.com?ref=njs-landing"
						class="text-slate-500 hover:text-slate-800"
					>Creative Tim</a
					>.
				</div>
			</div>
		</div>
	</div>
</footer>
@endsection

@pushonce('styles')
<link href="{{ asset('/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
@endpushonce
