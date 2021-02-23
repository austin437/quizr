window.addEventListener("load", function () {


   var view = {
       title: "Joe",
       calc: function () {
           return 2 + 4;
       },
   };

   var output = Mustache.render("{{title}} spends {{calc}}", view);

   var template = document.getElementById("template").innerHTML;
   var rendered = Mustache.render(template, { name: "Luke" });
   document.getElementById("target").innerHTML = rendered;
   
});

