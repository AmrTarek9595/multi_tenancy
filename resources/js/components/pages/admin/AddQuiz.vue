<template>
    <div class="container mt-5">
        <h2>Create Quiz</h2>
        <form @submit.prevent="submitQuiz">
            <div class="mb-3">
                <label for="nameOfQuiz" class="form-label">Quiz Name</label>
                <input type="text" v-model="nameOfQuiz" class="form-control" required>
            </div>
            <div v-for="(question, index) in questions" :key="index" class="mb-3">
                <label class="form-label">Question {{ index + 1 }}</label>
                <input type="text" v-model="question.question" class="form-control mb-2" required>
                <div v-for="(answer, ansIndex) in question.answers" :key="ansIndex" class="mb-2">
                    <input type="text" v-model="answer.answer" class="form-control mb-2" placeholder="Answer" required>
                    <input type="checkbox" v-model="answer.is_correct"> Correct
                </div>
                <button type="button" class="btn btn-secondary" @click="addAnswer(index)">Add Answer</button>
            </div>
            <button type="button" class="btn btn-secondary mb-3" @click="addQuestion">Add Question</button>
            <button type="submit" class="btn btn-primary">Submit Quiz</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            nameOfQuiz: '',
            questions: [
                {
                    question: '',
                    answers: [
                        { answer: '', is_correct: false },
                        { answer: '', is_correct: false }
                    ]
                }
            ]
        }
    },
    methods: {
        addQuestion() {
            this.questions.push({
                question: '',
                answers: [
                    { answer: '', is_correct: false },
                    { answer: '', is_correct: false }
                ]
            });
        },
        addAnswer(index) {
            this.questions[index].answers.push({ answer: '', is_correct: false });
        },
        submitQuiz() {
            const quizData = {
                nameOfQuiz: this.nameOfQuiz,
                question: this.questions.map(q => q.question),
                answer: this.questions.map(q => q.answers.map(a => ({
                    answer: a.answer,
                    is_correct: a.is_correct
                })))
            };

            this.$axios.post(this.baseUrl+'AddQuiz', quizData)
            .then(response => {
                alert('Quiz created successfully!');
            })
            .catch(error => {
                console.error('Error:', error.response.data.error || error.message);
            });
        }
    }
}
</script>

<style scoped>
/* Add any necessary styling here */
</style>

