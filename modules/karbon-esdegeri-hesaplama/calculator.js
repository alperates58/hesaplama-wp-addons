function hcCarbonEquivHesapla() {
    const C = parseFloat(document.getElementById('hc-ce-c').value || 0);
    const Mn = parseFloat(document.getElementById('hc-ce-mn').value || 0);
    const Cr = parseFloat(document.getElementById('hc-ce-cr').value || 0);
    const Mo = parseFloat(document.getElementById('hc-ce-mo').value || 0);
    const V = parseFloat(document.getElementById('hc-ce-v').value || 0);
    const Ni = parseFloat(document.getElementById('hc-ce-ni').value || 0);
    const Cu = parseFloat(document.getElementById('hc-ce-cu').value || 0);

    const CE = C + (Mn / 6) + ((Cr + Mo + V) / 5) + ((Ni + Cu) / 15);

    const resVal = document.getElementById('hc-ce-res-val');
    resVal.innerText = CE.toFixed(3);

    const msg = document.getElementById('hc-ce-msg');
    if (CE <= 0.40) {
        msg.innerText = "Mükemmel Kaynak Edilebilirlik";
        msg.style.color = "#27ae60";
    } else if (CE <= 0.45) {
        msg.innerText = "İyi Kaynak Edilebilirlik (Ön ısıtma gerekebilir)";
        msg.style.color = "#f39c12";
    } else {
        msg.innerText = "Zor Kaynak Edilebilirlik (Ön ısıtma şart)";
        msg.style.color = "#c0392b";
    }

    document.getElementById('hc-ce-result').classList.add('visible');
}
