function hcKopekYaşıHesapla() {
    const size = document.getElementById('hc-ky-size').value;
    const age = parseFloat(document.getElementById('hc-ky-age').value) || 0;
    
    let humanAge = 0;
    if (age <= 1) {
        humanAge = age * 15;
    } else if (age <= 2) {
        humanAge = 24;
    } else {
        let factor = 4;
        if (size === 'medium') factor = 5;
        if (size === 'large') factor = 7;
        humanAge = 24 + (age - 2) * factor;
    }

    document.getElementById('hc-ky-val').innerText = Math.round(humanAge) + " Yaş";
    document.getElementById('hc-ky-result').classList.add('visible');
}
