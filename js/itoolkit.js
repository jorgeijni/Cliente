var iToolkit =  {  Version: '1.0', Autor: 'Horacio R. Valdez',  Email: 'info[at]hvaldez.com.ar'  }
iToolkit.ComboEnlazado = new Class
({ 
	cboDependiente: null,
	serviceUrl: null,
	notifier: null,

	initialize: function(cboDependiente, cboDisparador, serviceUrl) 
	{ 
		this.cboDependiente = $(cboDependiente);
		this.serviceUrl = serviceUrl;
		this.cboDependiente.disabled = true;
		$(cboDisparador).addEvent('change', function () { this.CboChange($(cboDisparador));	}.bind(this) );	
	},
	
	CboChange: function(cbo)
	{
		this.cboDependiente.getParent().addClass('ajax-loading');
		this.cboDependiente.disabled = false;
		params = {};
		if(cbo.value == 'undefined')
			params.id = -1;
		else
			params.id = cbo.value;
		
		new Ajax(this.serviceUrl, {	method: 'get', 	onComplete: function(result) { 	this.FillCombo(result); 	}.bind(this)}).request(params);
	},
	
	FillCombo: function(result)
	{
		this.cboDependiente.getParent().removeClass('ajax-loading');
		this.cboDependiente.options.length = 0;
		Json.evaluate(result).each(
		function(obj, index)
		{
			var option = new Element('option');
			option.value = obj.value;
			option.text = obj.text;
			this.cboDependiente.options.add(option, index);
		}.bind(this));
		
		this.cboDependiente.fireEvent("change", -1, 1);
	}	
});
