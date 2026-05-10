function hcKelimeSayısıHesapla() {
    const text = document.getElementById('hc-wc-text').value.trim();
    
    const words = text ? text.split(/\s+/).length : 0;
    const chars = text.length;

    document.getElementById('hc-wc-val').innerText = words;
    document.getElementById('hc-wc-char').innerText = chars;
}
