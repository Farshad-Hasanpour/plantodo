@extends('layouts.base')

@section('body')

	<nav
		x-data="{showSidebar: false}"
		class="text-slate-700 antialiased top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg"
	>
		<div class="landing-container px-4 mx-auto flex flex-wrap items-center justify-between">
			<div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
				<a
					class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
					href="{{route('home')}}"
				>{{config('app.name')}}</a>
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
		@yield('content')
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
						Find me on any of these platforms.
					</h5>
					<div class="flex items-center mt-6 lg:mb-0 mb-6">
						<a
							href="https://www.linkedin.com/in/farshad-hasanpour/"
							target="_blank"
							rel="noopener"
						>
							<button
								class="bg-white text-sky-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
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
								class="bg-white bg-black shadow-lg font-normal h-10 w-10 flex items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
								type="button"
							>
								<x-icons.twitter class="w-4 h-4" />
							</button>
						</a>
						<a
							href="https://github.com/Farshad-Hasanpour/tall-learning"
							target="_blank"
							rel="noopener"
						>
							<button
								class="bg-white text-slate-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
								type="button"
							>
								<i class="fab fa-github"></i>
							</button>
						</a>
					</div>
				</div>
				<div class="w-full lg:w-6/12 px-4">
					<div class="flex flex-wrap items-top mb-6">
						<div class="w-full lg:w-4/12 px-4 ml-auto">
							<span class="block uppercase text-slate-500 text-sm font-semibold mb-2">Useful Links</span>
							<ul class="list-unstyled">
								@auth
									<li>
										<a
											class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
											href="{{ route('todo-list') }}"
										>Dashboard</a>
									</li>
									<li>
										<form
											action="{{ route('logout') }}"
											method="POST"
											class="inline-block"
										>
											@csrf
											<button
												type="submit"
												class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
											>Logout</button>
										</form>
									</li>
								@else
									<li>
										<a
											class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
											href="{{ route('login') }}"
										>Login</a>
									</li>
									<li>
										<a
											class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
											href="{{ route('register') }}"
										>Register</a>
									</li>
								@endauth
							</ul>
						</div>
						<div class="w-full lg:w-4/12 px-4">
							<span class="block uppercase text-slate-500 text-sm font-semibold mb-2">Other Resources</span>
							<ul class="list-unstyled">
								<li>
									<a
										class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
										href="https://github.com/Farshad-Hasanpour/tall-learning/blob/master/LICENSE"
										target="_blank"
										rel="noopener"
									>MIT License</a>
								</li>
								<li>
									<a
										class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
										href="https://freepik.com"
										target="_blank"
										rel="noopener"
									>Freepik</a>
								</li>
								<li>
									<a
										class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
										href="https://www.creative-tim.com/"
										target="_blank"
										rel="noopener"
									>Creative Tim</a>
								</li>
								<li>
									<a
										class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
										href="https://codewanted.net"
										target="_blank"
										rel="noopener"
									>My Blog</a>
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
						Copyright © <span x-data="{}" x-text="new Date().getFullYear()"></span> {{config('app.name')}}
						by
						<a
							href="https://www.linkedin.com/in/farshad-hasanpour/"
							target="_blank"
							rel="noopener"
							class="text-slate-500 hover:text-slate-800"
						>Farshad Hasanpour</a>.
					</div>
				</div>
			</div>
		</div>
	</footer>

	@isset($slot)
		{{ $slot }}
	@endisset
@endsection

@pushonce('styles')
<link href="{{ asset('/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
@endpushonce
