function hcHizSorgula() {
    const val = parseInt(document.getElementById('hc-hiz-input').value);
    
    let text = val + " km/h";
    if (val === 301) text = "300+ km/h";

    document.getElementById('hc-hiz-val').innerText = text;
    document.getElementById('hc-hiz-result').classList.add('visible');
}
