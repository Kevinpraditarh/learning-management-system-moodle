YUI.add("moodle-course-formatchooser",function(r,e){var o=function(){o.superclass.constructor.apply(this,arguments)};r.extend(o,r.Base,{initializer:function(e){var o,n,t,i;e&&e.formid&&(o=r.one("#"+e.formid),n=o.one("#id_updatecourseformat"),e=o.one("#id_format"),t=n.ancestor("fieldset"),i=o.get("action"),n&&e&&(n.setStyle("display","none"),e.on("change",function(){o.set("action",i+"#"+t.get("id")),n.simulate("click")})))}}),M.course=M.course||{},M.course.init_formatchooser=function(e){return new o(e)}},"@VERSION@",{requires:["base","node","node-event-simulate"]});