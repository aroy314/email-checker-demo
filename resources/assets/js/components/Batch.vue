<template>
    <section>
        <div class="jumbotron">
            <!--<div class="form-group" v-for="el in elements">-->
                <!--<alert type="success" :message="el.message" v-if="el.success == true"></alert>-->
                <!--<alert type="danger" :message="el.message" v-if="el.success == false"></alert>-->
            <!--</div>-->
            <ul class="list-group">
                <template v-for="el in elements">
                <li class="list-group-item list-group-item-success" v-if="el.success == true">{{el.message}}</li>
                <li class="list-group-item list-group-item-danger" v-if="el.success == false">{{el.message}}</li>
                </template>
            </ul>
            <h1 style="color: white;">Batch email verification</h1>

            <form action="/checkbatch" method="post" @submit.prevent="checkEmails"
                  @keydown="clearError($event.target.name)">

                <div :class="['form-group', errors ? 'has-error hasfeedback' : '' ]">
                    <label class="control-label" for="emails" v-if="errors">{{ errors.toString() }}</label>
                    <textarea type="text" name="emails" class="form-control" id="emails" aria-describedby="emailStatus"
                              v-model="check.emails" required="required" :disabled="disabled" rows="5">
                    </textarea>
                    <span class="glyphicon glyphicon-remove form-control-feedback" v-if="errors"
                          aria-hidden="true"></span>
                    <span id="emailStatus" class="sr-only">(error)</span>
                </div>

                <button type="submit" class="btn btn-lg btn-success" role="button" :disabled="disabled">Check</button>
            </form>

        </div>

    </section>
</template>

<script>
	export default {
		data: function () {
			return {
				check: {
					emails: ''
				},
				errors: [],
				disabled: false,
				elements: []
			}
		},
		methods: {
			checkEmails: function () {

				this.disabled = true

				let data = this.check

				axios.post('/checkbatch', data)
					.then(response => {
						this.onSuccess(response.data)
					})
					.catch(error => {
						this.onFail(error.data)
					})

			},
			onSuccess: function (data) {

				this.elements = data

				this.disabled = false
//				this.check = {emails: ''}
			},
			onFail: function (error) {
				this.errors = error
				this.disabled = false
			},
			clearError: function (field) {
				delete this.errors[field]
			}
		}
	}
</script>
