  var bus = new Vue();
    var test = Vue.component('create-test', {
        data: function () {
            return {
                ans: '',
                qanda: []
            }
        },
        methods:{
            addAnswer: function (index) {
                this.qanda[index-1].answers.push(this.ans);
                this.ans = '';
            },
            update: function (data) {
                this.qanda = data;
            }
        },
        updated: function () {
            bus.$emit('update-qanda', this.qanda)
        },
        template: '<div id="test" >' +
            '<div v-for="unit in qanda"><p class="hi">{{ unit.question }} </p>' +
            '<ul><li v-for="answer in unit.answers">{{ answer }}</li>' +
            '<input type="text" v-model="ans">' +
            '<button @click="addAnswer(unit.index)">Add answer</button></ul></div></div>'
    });

    var v = new Vue({
        el: '#app',
        data: {
            count: 1,
            name: '',
            description: '',
            q: '',
            qanda: []
        },
        components: {
            'create-test': test
        },
        updated: function () {
            this.$refs.con.update(this.qanda);
        },
        methods: {
            addQuestion: function () {
                this.qanda.push({index: this.count, question: this.q, answers: []});
                this.count++;
                this.q = ''
            },
            saveCurrentTest: function() {
                console.log(this.qanda);
                //a voobshe tut axios'om otpravlyaesh v php ili sohranyaesh kak tebe nuzhno
            }
        }
    });

    bus.$on('update-qanda', function (data) {
        v.qanda = data;
    })