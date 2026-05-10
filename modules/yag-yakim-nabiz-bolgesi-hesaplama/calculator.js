function hcFatBurnHrHesapla() {
    const age = parseInt(document.getElementById('hc-fb-age').value);
    const restHr = parseInt(document.getElementById('hc-fb-rest').value);

    if (!age || !restHr) {
        alert('Lütfen yaşınızı ve dinlenik nabzınızı giriniz.');
        return;
    }

    // Karvonen Formula
    // Max HR = 220 - age
    // Heart Rate Reserve (HRR) = Max HR - Rest HR
    // Target HR = (HRR * %Intensity) + Rest HR
    
    const maxHr = 220 - age;
    const hrr = maxHr - restHr;

    const lowerLimit = Math.round((hrr * 0.60) + restHr);
    const upperLimit = Math.round((hrr * 0.70) + restHr);

    const resVal = document.getElementById('hc-fb-res-val');
    resVal.innerText = `${lowerLimit} - ${upperLimit}`;

    document.getElementById('hc-fat-burn-hr-result').classList.add('visible');
}
