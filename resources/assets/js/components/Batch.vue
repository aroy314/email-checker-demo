<template>
    <section>
        <div class="jumbotron">
            <ul class="list-group">
                <template v-for="el in elements">
                    <li class="list-group-item list-group-item-success" v-if="el.success == true">{{el.message}}</li>
                    <li class="list-group-item list-group-item-danger" v-if="el.success == false">{{el.message}}</li>
                </template>
            </ul>
            <h1 style="color: white;">Batch email verification</h1>
            <form action="/checkbatch" method="post" @submit.prevent="checkEmails">
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Warning!</strong> You must enter comma separated emails.
                </div>
                <div class="form-group">
                    <label class="control-label" for="emails" v-if="errors">{{ errors ? errors.toString() : null }}
                    </label>
                    <textarea type="text" name="emails" class="form-control" id="emails" aria-describedby="emailStatus"
                              v-model="check.emails" required="required" :disabled="disabled" rows="5">
                    </textarea>
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
				this.elements = []
				this.errors = []
				let data = this.check
                if(data.emails.split(',').length >= 70){
					this.errors.push("to many emails, limit to 70")
                } else {
	                this.disabled = true
	                axios.post('/checkbatch', data)
		                .then(response => {
			                this.onSuccess(response.data)
		                })
		                .catch(error => {
			                this.onFail(error.data)
		                })
                }

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
