<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<section class="container main">
    <?=$render('sidebar', ['activeMenu' => 'tasks']);?>
<section class="feed mt-10">

        <div class="row">
            <div class="column pr-5">

            <div id="app">
                <button @click="getTaskList">Puxar Tarefas</button>

                <div v-for="task in tasks">
                    <h1>Tarefa - {{ task.message }}</h1>
                    <h3>Lido - {{ task.read }}</h3>
                </div>

            </div>

            </div>
            <div class="column side pl-5">
                <?=$render('right-side');?>
            </div>
        </div>

    </section>
</section>
<?=$render('footer');?>
<script>
    const app = new Vue({
    el: '#app',
    data: {
        tasks: {},
        message: 'oi'
    },
    methods: {
        getTaskList() {
            fetch("http://localhost/devsbook/public/tarefas/get")
            .then(r => r.json())
            .then(r => {
                this.tasks = r;
            })
        }
    }
})
</script>
