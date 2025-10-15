jQuery.fn.hasAttr = function (name) {
  return this.attr(name) !== undefined;
};

jQuery("#students-form").validate({
  onkeyup: false,
  onclick: false,
  onfocusout: false,
  //   debug: true,
  rules: {
    name: {
      required: !0
    },
    document: {
      required: !0
    }
  },
  messages: {
    name: "Preencha com um Nome",
    document: "Preencha com um CPF",
    "registrations_unit_id[]": "Selecione um Polo",
    "registrations_classe_id[]": "Selecione uma Turma",
    "registrations_program_id[]": "Selecione um Programa"
  },

  ignore: "*:not([name])", //Fixes your name issue
  errorClass: "invalid-feedback animated fadeInUp",
  errorElement: "div",

  submitHandler: function (form) {
    // do other things for a valid form

    var isValid = true;

    jQuery(".summernote").each(function (i, obj) {
      // console.log(obj);

      let content = jQuery(obj).summernote("code");
      let ref = jQuery(obj).data("ref");
      let textarea = jQuery(obj)
        .closest(".card-summernote")
        .find("[name=" + ref + "]");

      textarea.html(content ? content : "");
    });

    // swal({
    //   type: "warning",
    //   title: "Deseja realmente salvar os dados?",
    //   text: "Você estará salvando todos os dados preenchido!",
    //   icon: "warning",
    //   buttons: true,
    //   showCancelButton: true,
    //   confirmButtonColor: "#3085d6",
    //   cancelButtonColor: "#d33",
    //   confirmButtonText: "Sim continuar!"
    // }).then((sendForm) => {
    //   if (sendForm.value) {
    //     form.submit();
    //   }
    // });

    swal({
      type: "warning",
      title: "Deseja realmente salvar os dados?",
      html: `Você estará salvando todos os dados preenchido! <br><br>
            <button type="button" class="btn btn-yes btn-success swl-cstm-btn-yes-sbmt-rqst">Salvar e sair!</button> 
            <button type="button" class="btn btn-no btn-info swl-cstm-btn-no-jst-prceed">Salvar e Voltar!</button> 
            <button type="button" class="btn btn-cancel btn-danger swl-cstm-btn-cancel" >Cancelar</button>`,
      showCancelButton: false,
      showConfirmButton: false,
      onBeforeOpen: () => {
        const yes = document.querySelector(".btn-yes");
        const no = document.querySelector(".btn-no");
        const cancel = document.querySelector(".btn-cancel");

        yes.addEventListener("click", () => {
          console.log("Yes was Cliked.");
          yes.disabled = true;
          no.disabled = true;
          yes.value = "Enviando...";
          console.log(form);
		   form.setAttribute("method", "POST");
           form.submit();
        });

        no.addEventListener("click", () => {
          console.log("no was Cliked.");
          no.disabled = true;
          yes.disabled = true;
          no.value = "Enviando...";
          jQuery("#students-form").prepend("<input type='hidden' name='goBack' value='true' />");
        });

        cancel.addEventListener("click", () => {
          console.log("cancel was Cliked.");
          swal.close();
        });
      }
    });
  },
  errorPlacement: function (e, a) {
    jQuery(a).parents(".form-group > div").append(e);
  },
  highlight: function (e) {
    swal({
      title: "Ops...",
      type: "warning",
      text: "Existe campos obrigatórios a serem preenchidos!"
    });
    jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid");
  },
  success: function (e) {
    console.log(e);

    jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove();
  }
});
