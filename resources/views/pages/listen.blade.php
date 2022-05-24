@extends('layouts.index')

    @section('content')

        <div id="app">
            <ul class="list-group">
                <a href="#" class="list-group-item list-group-item-action" v-for="message in messages">
                    @{{ message.message }}
                </a>
            </ul>
        </div>


    @endsection

    @push('scripts')
        <script src="{{asset('js/app.js')}}"></script>

        <script>
            const app = new Vue({
                el: '#app',
                data: {
                    messages: {}
                },
                mounted() {
                    this.getMessage();
                    this.listen();
                },
                methods: {
                    getMessage() {
                        axios.get('api/notifications')
                                .then((result) => {
                                    this.messages = result.data
                                }).catch((err) => {
                                    console.log(err);
                                });
                    },
                    listen() {
                        Echo.channel('notify-user').listen('Notify', (e) => {
                            alert('You have a new message');
                            // this.messages.push(e)
                            this.messages.unshift(e)
                        });
                    }
                },
            });

        </script>
    @endpush
