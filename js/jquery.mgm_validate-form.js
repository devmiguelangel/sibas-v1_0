// JavaScript Document
(function($){
$.fn.extend({
	validateForm: function(options){
		var optionsDefault = {
			action: 'USR-login.php',
			method: 'POST',
			loading: true,
			nameLoading: '.loading',
			idForm: '#'+$(this).prop("id"),
			qs: false,
			cm: false,
			tm: false,
			issue: false
		}
		
		var option = $.extend(optionsDefault, options);
		
		var imgLoading = option.nameLoading+' img';
		
		$(this).submit(function(e){
			e.preventDefault();
			$(this).find(':submit').prop('disabled', true);
			
			if(option.issue === true){
				var _data = $(this).serialize();
				$.ajax({
					url:option.action,
					type:option.method,
					data:_data,
					dataType:"json",
					async:true,
					cache:false,
					beforeSend: function(){
						if($(option.nameLoading + " .loading-text").length)
							$(option.nameLoading + " .loading-text").remove();
						$(imgLoading).slideDown();
					},
					complete: function(){
						$(imgLoading).slideUp();
					},
					success: function(result){
						//alert(result);
						//$(".loading").html(result);
						$(option.nameLoading+" img:last").after('<span class="loading-text">'+result[2]+'</span>');
						setTimeout(function(){
							if(result[0] === 1){
								if(result[1] === 'R'){
									location.reload(true);								
								}else if(result[1] !== '')
									location.href = result[1];
							}else if(result[0] === 0){
								$(option.idForm+' :submit').prop('disabled', false);
							}
						},1250);
					}
				});
				return false;
			}
			
			var sw = true;
			var err = 'Esta informacion es obligatoria';
			
			var qs_mess_1 = '';
			var qs_mess_2 = '';
			var sw_qs_1 = true;
			var sw_qs_2 = true;
			
			$(this).find('.required, .not-required').each(function(index, element) {
				var value = element.value;
				var type = element.type;
				
				if(type != 'submit'){
					if(option.qs === false){
						if($(this).hasClass('required') === true){
							if(validateElement(element,err) === false){
								sw = false;
							}else if(validateElementType(element,err) === false){
								sw = false;
							}else if($(this).hasClass('wh') === true){
								var  wh_type = $(this).prop('id');
								if(wh_type.indexOf('weight') > -1){
									if(value < 40 || value > 140){
										if(confirm('Usted ha introducido un peso fuera de los parámetros normales. ¿Desea continuar de todas formas?') === false){
											sw = false;
											return false;
										}
									}
								}else if(wh_type.indexOf('height') > -1){
									if(value < 100){
										if(confirm('La estatura introducida para la persona es menor a 1 metro (100 cm.) ¿Desea continuar de todas formas?') === false){
											sw = false;
											return false;
										}
									}
								}
							}
						}else if($(this).hasClass('not-required') === true){
							removeClassE(element);
							if(validateElementType(element,err) === false){
								sw = false;
							}
						}
					}else if(option.qs === true){
						if($(this).hasClass('required') === true){
							var qs_name = $(this).prop('name');
							var qs_no = qs_name.split('-');
							var qs_id = $(this).prop('id');
							
							var qs_val = $("input[name="+qs_name+"]:radio").is(':checked');
							
							if(qs_val === false){
								if(1 === parseInt(qs_no[2])){
									qs_mess_1 += qs_no[3] + ', ';
								}else if(2 === parseInt(qs_no[2])){
									qs_mess_2 += qs_no[3] + ', ';
								}
								sw = false;
							}else{
								if(1 === parseInt(qs_no[2])){
									if(!$(this).is(':checked'))
										sw_qs_1 = false;
								}else if(2 === parseInt(qs_no[2])){
									if(!$(this).is(':checked'))
										sw_qs_2 = false;
								}
							}
						}
					}
				}
			});
			
			if(option.qs === true){
				var qs_mess = '';
				
				if(sw === false){
					if(qs_mess_1.length > 0){
						qs_mess += 'Por favor, responda las preguntas: ' + qs_mess_1.slice(0, $.trim(qs_mess_1).length - 1) + ' del Titular 1';
						if(qs_mess_2.length > 0){
							qs_mess += '<br>y las preguntas: ' + qs_mess_2.slice(0, $.trim(qs_mess_2).length - 1) + ' del Titular 2';
						}
					}else if(qs_mess_2.length > 0){
						qs_mess += 'Por favor, responda las preguntas: ' + qs_mess_2.slice(0, $.trim(qs_mess_2).length - 1) + ' del Titular 2';
					}
				}else{
					var err_1 = '';
					var err_2 = '';
					
					if(sw_qs_1 === false){
						err_1 = 'Ingrese las observaciones del Titular 1';
						if(validateElement($("#dq-resp-1"),err_1) === false)
							sw = false;
					}else{
						removeClassE($("#dq-resp-1"));
					}
					
					if(sw_qs_2 === false){
						err_2 = 'Ingrese las observaciones del Titular 2';
						if(validateElement($("#dq-resp-2"),err_2) === false)
							sw = false;
					}else{
						removeClassE($("#dq-resp-2"));
					}
				}
				
				if($(option.nameLoading+" .loading-text").length)
					$(option.nameLoading+" .loading-text").remove();
				
				$(option.nameLoading+" img:last").after('\
					<span class="loading-text" style="color:#FF4040;">'+qs_mess+'</span>');
			}
			
			if(sw === true && option.tm === true){
				var type_mov = $("#dcr-type-mov").prop('value');
				if(type_mov === 'LC'){
					var amount = parseFloat($("#dcr-amount").prop('value'));
					var amount_de = parseFloat($("#dcr-amount-de").prop('value'));
					var amount_acc = parseFloat($("#dcr-amount-acc").prop('value'));
					var currency = $("#dcr-currency").prop('value');
					if(currency === 'USD')
						amount = amount * 7;
					
					if(!isNaN(amount_acc)){
						if(validarReal(amount_acc) === true){
							if(amount_acc >= amount && amount_acc >= amount_de){
								sw = true;
							}else{
								sw = false;
								alert('El monto total acumulado debe ser mayor o igual al monto actual solicitado y al saldo deudor actual');
							}
						}else{
							sw = false;
						}
					}else{
						sw = false;
					}
				}
			}
			
			var k, j;
			var data_01 = new Array();
			var data_02 = new Array();
			var data_obs_01 = new Array();
			var data_obs_02 = new Array();
			var cm_question = '';
			var val_qs = '';
			if(option.cm === true){
				var nCl = parseInt($("#fp-nCl").prop('value'));
				if(nCl > 0){
					var cm1 = parseInt($('input:radio[name=fc-cm-1]:checked').prop('value'));
					if(cm1 === 1){
						k = j = 0;
						$(".cb-qs-1").each(function(){
							if($(this).is(':checked')){
								val_qs = $(this).attr("value");
								data_01[k] = 'Y|' + val_qs;
								if($(this).hasClass('txtarea') === true){
									data_obs_01[j] = val_qs + '|' + $("#fc-obs-1-" + val_qs).prop('value');
									j += 1;
								}
							}else{
								data_01[k] = 'N|' + $(this).attr("value");
							}
							k+=1;
						});
						
					}
					
					if(nCl === 2){
						var cm2 = parseInt($('input:radio[name=fc-cm-2]:checked').prop('value'));
						if(cm2 === 1){
							k = j = 0;
							$(".cb-qs-2").each(function(){
								if($(this).is(':checked')){
									val_qs = $(this).attr("value");
									data_02[k] = 'Y|' + val_qs;
									if($(this).hasClass('txtarea') === true){
										data_obs_02[j] = val_qs + '|' + $("#fc-obs-2-" + val_qs).prop('value');
										j += 1;
									}
								}else{
									data_02[k] = 'N|' + $(this).attr("value");
								}
								k+=1;
							});
							
						}
					}
				}
			}
			// No Emisiones
			if(sw === true){
				var _data = $(this).serialize();
				
				if(option.cm === true)
					_data += '&data-01='+JSON.stringify(data_01)+'&data-02='+JSON.stringify(data_02)+'&data-obs-01='+JSON.stringify(data_obs_01)+'&data-obs-02='+JSON.stringify(data_obs_02);
				
				$.ajax({
					url:option.action,
					type:option.method,
					data:_data,
					dataType:"json",
					async:true,
					cache:false,
					beforeSend: function(){
						if($(option.nameLoading+" .loading-text").length)
							$(option.nameLoading+" .loading-text").remove();
						$(imgLoading).slideDown();
					},
					complete: function(){
						$(imgLoading).slideUp();
					},
					success: function(result){
						//alert(result);
						//$(".loading").html(result);
						$(option.nameLoading+" img:last").after('<span class="loading-text">'+result[2]+'</span>');
						setTimeout(function(){
							if(result[0] === 1){
								if(result[1] === 'R')
									location.reload(true);
								else if(result[1] === 'CM'){
									$("#ctr-certified").hide();
									$("#ctr-process").slideDown();
								}else if(result[1] !== '')
									location.href = result[1];
							}else if(result[0] === 0){
								$(option.idForm+' :submit').prop('disabled', false);
							}
						},2000);
					}
				});
				return false;
			}else{
				$(this).find(':submit').prop('disabled', false);
			}
		});
		
		function addClassE(element,err){
			var _id = $(element).prop('id');
			$(element).addClass('error-text');
			if(!$("#"+_id+" + .msg-form").length) {
				$("#"+_id+":last").after('<span class="msg-form">'+err+'</span>');
			}
		}
		
		function removeClassE(element){
			var _id = $(element).prop('id');
			$(element).removeClass('error-text');
			if($("#"+_id+" + .msg-form").length) {
				$("#"+_id+" + .msg-form").remove();
			}
		}
		
		function validateElement(element,err){
			var _value = $(element).prop('value');
			if(_value.length === 0 || /^\s+$/.test(_value)){
				addClassE(element,err);
				return false;
			}else{
				removeClassE(element,err);
				return true;
			}
		}
		
		function validateElementType(element,err){
			var _value = $(element).prop('value');
			var regex = null;
			
			if($(element).hasClass('number') === true){
				regex = /^([0-9])*$/;
				err = 'Ingrese solo numeros';
			}else if($(element).hasClass('real') === true){
				regex = /^([0-9])*[.]?[0-9]*$/;
				err = 'Ingrese solo numeros.';
			}else if($(element).hasClass('text') === true){
				regex = /^[a-zA-ZáÁéÉíÍóÓúÚñÑüÜ\s]*$/;
				err = 'Ingrese solo texto';
			}else if($(element).hasClass('text-2') === true){
				regex = /^[a-zA-Z0-9áÁéÉíÍóÓúÚñÑüÜ\s\-]*$/;
				err = 'Ingrese solo texto';
			}else if($(element).hasClass('dni') === true){
				regex = /^[a-zA-Z0-9\s\-]*$/;
				err = 'Documento de identidad no valido';
			}else if($(element).hasClass('email') === true){
				regex = /^([a-z]+[a-z0-9._-]*)@{1}([a-z0-9\.]{2,})\.([a-z]{2,3})$/;
				err = 'Email invalido';
			}else if($(element).hasClass('multiple-email') === true){
				regex = /^([a-z]+[a-z0-9._-]*)@{1}([a-z0-9\.]{2,})\.([a-z]{2,3})$/;
				err = 'Email invalido';
				
				var arr_email = _value.split(',')
				var sw_email = true;
				for(var i = 0; i < arr_email.length; i++){
					if(!(regex.test(arr_email[i])) && arr_email[i].length !== 0)
						sw_email = false;
				}
				
				if(sw_email === false){
					addClassE(element,err);
					$(element).prop('value', '');
					return false;
				}else{
					removeClassE(element,err);
					return true;
				}
			}else if($(element).hasClass('phone') === true){
				regex = /^\d{7,8}$/;
				err = 'Telefono Invalido';
			}else if($(element).hasClass('wh') === true){
				regex = /^\d{2,3}$/;
				err = 'Numero Invalido';
			}
			
			if(regex !== null){
				if(!(regex.test(_value)) && _value.length !== 0){
					addClassE(element,err);
					$(element).prop('value', '');
					return false;
				}else{
					removeClassE(element,err);
					return true;
				}
			}else{
				return true;
			}
		}
		
		function validarReal(dat){
			var er_num=/^([0-9])*[.]?[0-9]*$/;
			if(dat.value != ""){
				if(!er_num.test(dat))
					return false;
				return true
			}
		}
	}
	
	
});
})(jQuery);