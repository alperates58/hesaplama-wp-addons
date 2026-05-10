function hcPrivacyFenceHesapla() {
    const L = parseFloat(document.getElementById('hc-pf-len').value);
    const W = parseFloat(document.getElementById('hc-pf-pwidth').value);

    if (!L || !W) {
        alert('Lütfen uzunluk ve panel genişliği giriniz.');
        return;
    }

    const panels = Math.ceil(L / W);
    const posts = panels + 1;

    document.getElementById('hc-pf-res-panels').innerText = panels;
    document.getElementById('hc-pf-res-posts').innerText = posts;

    document.getElementById('hc-pfence-result').classList.add('visible');
}
