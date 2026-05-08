function hcEmeklilikHesapla() {
    const gender = document.getElementById('hc-emk-gender').value;
    const birthStr = document.getElementById('hc-emk-birth').value;
    const startStr = document.getElementById('hc-emk-start').value;
    const currentDays = parseInt(document.getElementById('hc-emk-days').value) || 0;
    const type = document.getElementById('hc-emk-type').value;

    if (!birthStr || !startStr) {
        alert('Lütfen tüm tarihleri doldurunuz.');
        return;
    }

    const birthDate = new Date(birthStr);
    const startDate = new Date(startStr);
    const today = new Date('2026-05-08');

    let requiredAge = 0;
    let requiredDays = 0;
    let status = "";

    // 1. Period: Before 08.09.1999 (EYT)
    if (startDate < new Date('1999-09-08')) {
        status = "EYT Kapsamındasınız";
        requiredAge = 0; // Age requirement removed for EYT
        if (type === 'ssk') {
            // Days vary between 5000-5975, using 5975 as conservative max for all
            requiredDays = 5975;
        } else {
            requiredDays = (gender === 'male') ? 9000 : 7200;
        }
    } 
    // 2. Period: 08.09.1999 - 30.04.2008
    else if (startDate <= new Date('2008-04-30')) {
        status = "1999-2008 Girişli";
        if (type === 'ssk') {
            requiredAge = (gender === 'male') ? 60 : 58;
            requiredDays = 7000;
        } else {
            requiredAge = (gender === 'male') ? 60 : 58;
            requiredDays = 9000;
        }
    }
    // 3. Period: After 30.04.2008
    else {
        status = "2008 Sonrası Girişli";
        requiredDays = 7200;
        // Age increases based on when 7200 days are completed. 
        // For simplicity using 65 (male) and 60+ (female)
        requiredAge = (gender === 'male') ? 65 : 62;
    }

    const ageAtStart = (startDate - birthDate) / (1000 * 60 * 60 * 24 * 365.25);
    const currentAge = (today - birthDate) / (1000 * 60 * 60 * 24 * 365.25);

    const daysLeft = Math.max(0, requiredDays - currentDays);
    const ageLeft = Math.max(0, requiredAge - currentAge);

    // Calculate estimated retirement date
    // 1. Days completion date
    const daysCompDate = new Date(today);
    daysCompDate.setDate(daysCompDate.getDate() + daysLeft);

    // 2. Age completion date
    const ageCompDate = new Date(birthDate);
    ageCompDate.setFullYear(ageCompDate.getFullYear() + requiredAge);

    // Final date is the later of the two
    const retirementDate = (daysCompDate > ageCompDate) ? daysCompDate : ageCompDate;

    // Display Results
    document.getElementById('hc-res-status').innerText = status;
    document.getElementById('hc-res-age-req').innerText = requiredAge > 0 ? requiredAge : "Yaş Sınırı Yok";
    document.getElementById('hc-res-days-req').innerText = requiredDays.toLocaleString('tr-TR');
    document.getElementById('hc-res-days-left').innerText = daysLeft.toLocaleString('tr-TR');
    
    if (daysLeft === 0 && currentAge >= requiredAge) {
        document.getElementById('hc-res-date').innerText = "Emekliliğe Hak Kazandınız!";
        document.getElementById('hc-res-date').style.color = "#27ae60";
    } else {
        document.getElementById('hc-res-date').innerText = retirementDate.toLocaleDateString('tr-TR');
        document.getElementById('hc-res-date').style.color = "#2c3e50";
    }

    document.getElementById('hc-emeklilik-result').classList.add('visible');
}
