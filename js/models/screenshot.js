ST.module("Models", function(Mod, App, Backbone, Marionette, $, _){
	"use strict";

	var Screenshot = Backbone.Model.extend({
		defaults: {
			src: null,
			fullSrc: null,
			moment: null,
			timestamp: null
		},
		initialize: function(attributes, options) {
			if (this.validate(attributes, options)) {
				this.set('moment', moment(attributes.src, 'YYYY-MM-DD HH-mm-ss'));
				this.set('fullSrc', attributes.src.replace('thumbs', 'full'));
			}
		},
		validate: function(attributes, options) {
			return !!attributes.src;
		},
		parse: function(data) {
			debugger;
		}
	});

	var ScreenshotCollection = Backbone.Collection.extend({
		model: Screenshot,
		url: 'screens/screens-list.txt',
		comparitor: function(model) {
			return model.get('moment').unix();
		},
		parse: function(data) {
			debugger;
		}
	});

	var Activity = Backbone.Model.extend({
		defaults: {
			screenshots: null,
			label: null,
			length: null
		},
		initialize: function(attributes, options) {
			var coll, firstMoment;
			if (attributes.screenshots && attributes.screenshots.length) { // TODO: check if it's already a collection
				coll = new ScreenshotCollection(attributes.screenshots);
				firstMoment = coll.at(0).get('moment');
				this.set('screenshots', coll);
				// TODO: this "if" can go outside it's parent once the above TODO is done.
				if (!attributes.label) {
					this.set('label', firstMoment.calendar()); // TODO: customize format
				}
				this.set('length', coll.length);
			}
		}
	});

	var ActivityCollection = Backbone.Collection.extend({
		model: Activity
	});

	// TODO: make more like a namespace
	Mod.Screenshot = Screenshot;
	Mod.ScreenshotCollection = ScreenshotCollection;
	Mod.Activity = Activity;
	Mod.ActivityCollection = ActivityCollection;
});


