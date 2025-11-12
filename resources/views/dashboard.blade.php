<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Bem-vindo, {{ Auth::user()->name }}!</h1>
                    <p>Você está logado com sucesso no sistema 🎉</p>
                    <p>Aqui é onde você pode começar a montar o conteúdo do seu site.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

