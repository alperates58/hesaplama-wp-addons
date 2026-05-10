function hcWacHesapla() {
    const bmr = parseFloat(document.getElementById('hc-wac-bmr').value);
    const surplus = parseFloat(document.getElementById('hc-wac-goal').value);

    if (!bmr) return;

    const target = bmr + surplus;
    document.getElementById('hc-wac-res-val').innerText = Math.round(target).toLocaleString('tr-TR');
    document.getElementById('hc-wa-calories-result').classList.add('visible');
}
