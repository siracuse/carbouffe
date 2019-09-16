  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
     
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 3,
						message:'Votre prénom doit au moins contenir 3 caractères !'
                    },
                        notEmpty: {
                        message: 'Veuillez renseigner votre prénom !'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 3,
						message:'Votre nom doit au moins contenir 3 caractères !'
                    },
                    notEmpty: {
                        message: 'Veuillez renseigner votre nom !'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner votre adresse mail !'
                    },
					
                    emailAddress: {
                        message: 'Veuillez renseigner une adresse mail valide !'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner votre numéro de téléphone !'
                    },
                    phone: {
                        country: 'FR',
                        message: 'Veuillez renseigner un numéro de téléphone valide !'
                    }
                }
            },
            address: {
                validators: {
                     stringLength: {
                        min: 8,
						message:'Le nom de votre adresse doit au moins contenir 8 caractères !'
                    },
                    notEmpty: {
                        message: 'Veuillez renseigner votre adresse !'
                    }
                }
            },
            city: {
                validators: {
                     stringLength: {
                        min: 4,
						message:'Le nom de votre ville doit au moins contenir 4 caractères !'
                    },
                    notEmpty: {
                        message: 'Veuillez renseigner le nom de votre ville !'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez selectionner un pays !'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Veuillez renseigner votre adresse postal !'
                    },
                    zipCode: {
                        country: 'FR',
                        message: 'Veuillez renseigner une adresse postal valide !'
                    }
                }
            },
			societe: {
                validators: {
                     stringLength: {						
                        min: 4,
						message:'Le nom de votre société doit au moins contenir 4 caractères !'
                    },
                    notEmpty: {
                        message: 'Veuillez renseigner le nom d une société réelle !'
                    }
                }
            },
			sujet: {
                validators: {
                     stringLength: {
                        min: 4,
						message:'Le nom de votre sujet doit au moins contenir 4 caractères !'
                    },
                    notEmpty: {
                        message: 'Veuillez renseigner un sujet concernant votre message !'
                    }
                }
            },
            comment: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 3000,
                        message:'Minimum 10 mots et 3000 mots maximum !'
                    },
                    notEmpty: {
                        message: 'Veuillez renseigner votre message. Avec un nombre minimum de 10 mots et 3000 mots maximum  !'
                    }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});

