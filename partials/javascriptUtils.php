<script>
    function getCleanDates(daysToAdd){
        var dates = []
        for(i = 0; i < daysToAdd; i++) {
            if(i == 0){
                var date = new Date()
            } else {
                var date = new Date()
                date.setDate(date.getDate() + i);
            }

            var isoString = date.toISOString()
            var cleanDate = isoString.substring(0, isoString.indexOf('T'))
            dates[i] = cleanDate
        }
        return dates
      }

      function formatDate(timestamp){
        jsTimestamp = new Date(timestamp)
        hoursFull = String(jsTimestamp.toLocaleTimeString())
        hoursArray = hoursFull.split(':')
        amPm = hoursArray[2].toLowerCase().replace(/[^a-zA-Z]+/g, '');
        displayTime = hoursArray[0] + ':' + hoursArray[1] + ' ' + amPm

        return displayTime
      }


      function getIcon(conditions, whichDay, today){
        if (~conditions.indexOf('Clear') && curMeridiem == 'PM' && today){
          if(curHour >= 6) {
            $('.' + whichDay).attr('data-feather', 'moon')
            feather.replace()
          } else if (curHour < 6) {
            $('.' + whichDay).attr('data-feather', 'sun')
            feather.replace()
          }
        } else if (~conditions.indexOf('Clear') && curMeridiem == 'AM' && today){
          if(curHour >= 6) {
            $('.' + whichDay).attr('data-feather', 'sun')
            feather.replace()
          } else if (curHour < 6) {
            $('.' + whichDay).attr('data-feather', 'moon')
            feather.replace()
          }
        } else if (~conditions.indexOf('Clear') && !today){
          $('.' + whichDay).attr('data-feather', 'sun')
            feather.replace()
        } else if (~conditions.indexOf('Cloud')) {
          $('.' + whichDay).attr('data-feather', 'cloud')
          feather.replace()
        } else if (~conditions.indexOf('Rain')) {
          $('.' + whichDay).attr('data-feather', 'cloud-rain')
          feather.replace()
        } else if (~conditions.indexOf('Snow')) {
          $('.' + whichDay).attr('data-feather', 'cloud-snow')
          feather.replace()
        }
      }

      function getConditionText(conditions){
        if(~conditions.indexOf('Clear')) {
          conditionText = ' with clear skies.';
        } else if(~conditions.indexOf('Rain')) {
          conditionText = ' and raining.';
        } else if(~conditions.indexOf('Snow')) {
          conditionText = ' and snowing.';
        } else if(~conditions.indexOf('Cloud')) {
          conditionText = ' and cloudy.'
        }  else if(~conditions.indexOf('Mist')) {
          conditionText = ' and misty.'
        } else {
          conditionText = ''
        }
        return conditionText;
      }


</script>