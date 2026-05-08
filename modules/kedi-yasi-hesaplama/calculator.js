function hcKediYaşıHesapla() {
    const age = parseFloat(document.getElementById('hc-kyk-age').value) || 0;
    
    let humanAge = 0;
    if (age <= 1) {
        humanAge = age * 15;
    } else if (age <= 2) {
        humanAge = 24;
    } else {
        humanAge = 24 + (age - 2) * 4;
    }

    document.getElementById('hc-kyk-val').innerText = Math.round(humanAge) + " Yaş";
    document.getElementById('hc-kyk-result').classList.add('visible');
}
