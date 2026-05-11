function hcReaktorHesapla() {
    const q = parseFloat(document.getElementById('hc-rh-flow').value);
    const cin = parseFloat(document.getElementById('hc-rh-cin').value);
    const cout = parseFloat(document.getElementById('hc-rh-cout').value);
    const k = parseFloat(document.getElementById('hc-rh-k').value);

    if (isNaN(q) || isNaN(cin) || isNaN(cout) || isNaN(k) || k <= 0 || cout <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (cout >= cin) {
        alert('Çıkış konsantrasyonu girişten küçük olmalıdır.');
        return;
    }

    // CSTR 1st order: V = Q * (Cin - Cout) / (k * Cout)
    const tau = (cin - cout) / (k * cout);
    const v = q * tau;

    document.getElementById('hc-rh-res-total').innerText = v.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-rh-res-tau').innerText = tau.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-rh-result').classList.add('visible');
}
