$("#find-employees-inday").submit(function(e) {
        e.preventDefault(); 

        const  form = $(this);
        const  url = form.attr('action');
        let set_day = $("#day").val(); 
        let set_vacation = $("#vacation").val(); 

        console.log(set_day);
        console.log(set_vacation);

       $.ajax({
            type: "GET",
            url: url,
            data: {day:set_day, vacation:set_vacation  },
                success: function(data) {$("#give-employees-inday")
                .html('<div class="app-searcher__form-alert"><p class="app-searcher__form-alert-desc">'+ data +'</p></div>' );}
        });
 });

 $("#find-employees-inmonth").submit(function(e) {
            e.preventDefault(); 

            const  form = $(this);
            const  url = form.attr('action');
            let set_month = $("#month").val(); 

            $.ajax({
                type: "GET",  url: url,  data: {month:set_month},
                success: function(data) {$("#give-employees-inmonth")
                .html('<div class="app-searcher__form-alert"><p class="app-searcher__form-alert-desc">'+ data +'</p></div>' );}
            });
 });