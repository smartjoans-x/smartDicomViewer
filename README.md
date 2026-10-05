# smartDicomViewer - Free DICOM Viewer & API

A free online DICOM viewer to view and share DICOM images in any browser. Open CT, MRI, X-ray, and ultrasound images straight from your computer, phone, or scan CD, or from your hospital system with the free API. 

*For sharing and secondary viewing only. Not for primary diagnosis or reporting.*

## Features
* **100% Free & No Sign-up:** The viewer and API are always free for everyone.
* **No Uploads:** Privacy by design. Images are read locally in your browser memory and are never uploaded to any server.
* **Advanced Tools:** MPR, 3D volume view, multi-layout (up to 3x3), window/level presets, and measurements.
* **Mobile Ready:** Touch scrolling, pinch zoom, and a phone-friendly layout. Works perfectly on Android and iOS.
* **Format Support:** Uncompressed, JPEG baseline and lossless, JPEG-LS, JPEG 2000, and RLE.

## Getting Started via GitHub (CDN)

You do not need to host the API script yourself. You can serve `smartviewer.js` directly from this repository using the jsDelivr CDN and integrate it into your web app.

### 1. Include the Script
Add the following script tag to your HTML page:


<script src="[https://cdn.jsdelivr.net/gh/smartjoans-x/smartDicomViewer/smartviewer.js](https://cdn.jsdelivr.net/gh/smartjoans-x/smartDicomViewer/smartviewer.js)"></script>


2. Open Images from Your Server (Way 3)
Call SmartViewer.open() from a button click. Your page reads the images from your own server and hands them to SmartViewer inside the browser. No CORS setup is required for this method.

HTML
<button id="view-btn">View DICOM Images</button>

<script>
document.getElementById('view-btn').addEventListener('click', () => {
  SmartViewer.open({
    title: 'CT Brain - Patient Name',
    files: [
      '/studies/1234/IM0001.dcm',
      '/studies/1234/IM0002.dcm',
      '/studies/1234/IM0003.dcm'
    ]
  });
});
</script>

3. Open Local Files Chosen by the User
Allow users to select DICOM files directly from their device:

HTML
<input type="file" multiple onchange="SmartViewer.open({ title: 'My Study', files: [...this.files] })">
CORS Configuration (For Image Links & Manifests)
If you are using Way 1 (Image Links) or Way 2 (Study Manifest) where SmartViewer directly fetches files from your server, your server must use HTTPS and send the following CORS header to allow access:

Plaintext
Access-Control-Allow-Origin: [https://smartjoans.space](https://smartjoans.space)
Note: If you use Way 3 (smartviewer.js) as shown in the code examples above, no CORS setup is needed because your own page handles reading the files.
