function hcGardenFenceHesapla() {
    const L = parseFloat(document.getElementById('hc-gf-len').value);
    const D = parseFloat(document.getElementById('hc-gf-dist').value);

    if (!L || !D) {
        alert('Lütfen uzunluk ve direk aralığı giriniz.');
        return;
    }

    const posts = Math.ceil(L / D) + 1;
    
    document.getElementById('hc-gf-res-posts').innerText = posts;
    document.getElementById('hc-gf-res-wire').innerText = Math.ceil(L);

    document.getElementById('hc-gfence-result').classList.add('visible');
}
