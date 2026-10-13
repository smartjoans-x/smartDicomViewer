SMARTVIEWER
Open-Source Web DICOM Viewer
GitHub Project Documentation
Free online DICOM viewer • Local-first privacy • Free integration API
<img width="1280" height="661" alt="image" src="https://github.com/user-attachments/assets/741c7b1d-f99f-4e69-a340-1db927890e2d" />


Screenshot 1 — SmartViewer landing page captured from the supplied video.
1. Project overview
SmartViewer is a browser-based DICOM viewer for opening, exploring and sharing medical imaging studies. It supports CT, MRI, X-ray and ultrasound DICOM files from a computer, phone, scan CD/DVD, removable drive, or an integrated hospital system. The viewer runs in the browser and is intended for sharing and secondary viewing.
Project URL: https://smartjoans.space/dicom/
Website: https://smartjoans.space/
Privacy model: files selected from the user's device are processed in the browser. The website states that images are not uploaded to or stored by smartjoans.space.
2. Key features
    • Open DICOM files, folders, scan CDs/DVDs and removable drives; drag and drop is supported.
    • Series grouping and slice sorting using DICOM metadata.
    • Smooth image scrolling using the mouse wheel, touch gestures or keyboard.
    • Window/level adjustment and presets for brain, lung, bone, abdomen, liver and other views.
    • Measurements: length, angle, elliptical ROI and pixel probe.
    • Zoom, pan, magnifier, rotate, flip, invert and PNG export.
    • Multi-viewport layouts from 1×1 up to 3×3.
    • MPR views: axial, coronal and sagittal; MIP slabs from 5–40 mm.
    • 3D volume view with presets such as bone, skin, soft tissue, vessel, lung and MIP.
    • Cine playback from 5–30 frames per second and searchable DICOM tags.
    • Hide patient details before screen sharing.
    • Mobile-friendly interaction and support for several DICOM compression types.
    • Free API integration for websites, clinics, PACS, RIS and patient portals.
3. Screenshots from the video
The following screenshots are extracted from the supplied screen-recording video. They illustrate the landing page, viewer loading state, single-image viewing, measurement tools, multi-view layout and 3D view.
<img width="1280" height="661" alt="image" src="https://github.com/user-attachments/assets/d1a11c12-a7b1-4e3f-a27d-034ddac7949c" />

Landing page and open-study entry point
<img width="1280" height="661" alt="image" src="https://github.com/user-attachments/assets/7d570011-aa2b-4c2b-befb-35438141ba37" />

Viewer loading/opening state
<img width="1280" height="661" alt="image" src="https://github.com/user-attachments/assets/78df8a88-0f4d-4b79-b3e1-7ba3bf73626c" />

Image viewing workspace
<img width="1280" height="661" alt="image" src="https://github.com/user-attachments/assets/ea4cec75-2746-41d3-8169-61c62e49138d" />

Measurement tools over a CT image
<img width="1280" height="661" alt="image" src="https://github.com/user-attachments/assets/5b5e3cca-b1bb-4701-b2b7-585681755a10" />

Multi-planar reconstruction layout
<img width="1280" height="661" alt="image" src="https://github.com/user-attachments/assets/5c9b2de6-0a46-4df2-8c59-db2fbb275395" />

MPR workspace with multiple viewports
<img width="1280" height="661" alt="image" src="https://github.com/user-attachments/assets/d3b4896d-0509-4516-9572-f922cabd2793" />

3D volume rendering view
4. Getting started
Open files from a device
    • Open https://smartjoans.space/dicom/ in a modern browser.
    • Choose a DICOM folder or individual files, or drag and drop files into the viewer.
    • For a scan CD/DVD or pen drive, open the drive and select the study folder. The viewer skips DICOMDIR and viewer-program files.
    • On a phone or tablet, use the file picker to select one or more DICOM files. Phones may not allow selecting an entire folder.
    • Select a series and use the viewing tools, layouts, MPR or 3D controls as needed.
5. Keyboard shortcuts
W	Window / level
D	Drag to scroll
Z	Zoom
P	Pan
M	Magnifier
L	Length measurement
A	Angle measurement
E	Elliptical ROI
B	Pixel probe
↑ / ↓	Previous / next image
← / →	Previous / next series
PgUp / PgDn	Move by 10 images
Space	Play / pause cine
1–6	Switch layouts
X	MPR on / off
R	Reset view
I	Invert
O	Rotate 90°
H / V	Flip
T	Text overlay
G	DICOM tags
S	Save PNG
F	Full screen
Esc	Leave MPR / 3D
6. Free API integration
The viewer can be launched from an external website in three ways. Use image links for a small number of files, a JSON manifest for larger studies hosted on an HTTPS server, or smartviewer.js when your own page can read the files.
Way 1 — Open image URLs
https://smartjoans.space/dicom/?title=Chest%20X-ray&url=ENCODED_IMAGE_URL_1&url=ENCODED_IMAGE_URL_2
Add one url parameter per DICOM image. URL-encode each file address. The video documentation recommends this for small studies; for larger studies, use a manifest.
Way 2 — Open a study manifest
https://smartjoans.space/dicom/?manifest=ENCODED_MANIFEST_URL
The manifest endpoint should return JSON, for example:
{
  "title": "CT Brain",
  "files": [
    {
      "name": "IM0001.dcm",
      "url": "https://pacs.example.com/file.php?study=1234&f=IM0001.dcm",
      "size": 525312
    },
    {
      "name": "IM0002.dcm",
      "url": "file.php?study=1234&f=IM0002.dcm",
      "size": 525312
    }
  ]
}
Required: files array and each file's url. Optional fields include title, file name and byte size. File order is not important because SmartViewer sorts images by series and instance information.
Way 3 — Integrate smartviewer.js
<script src="https://smartjoans.space/dicom/smartviewer.js"></script>
<button id="view">View images</button>

<script>
document.getElementById('view').addEventListener('click', () => {
  SmartViewer.open({
    title: 'CT Brain',
    files: [
      '/studies/1234/IM0001.dcm',
      '/studies/1234/IM0002.dcm',
      '/studies/1234/IM0003.dcm'
    ]
  });
});
</script>
Call SmartViewer.open() from a user click. The files option accepts file addresses and, according to the project documentation, File objects, Blobs, ArrayBuffers and supported object forms. The default mode is overlay; tab mode can open the viewer in a new tab.
7. Server and CORS notes
    • For image-link and manifest methods, the image server must use HTTPS.
    • The image/manifest server must allow the viewer origin using the CORS header: Access-Control-Allow-Origin: https://smartjoans.space
    • For HTTP or LAN-hosted files, use the smartviewer.js integration method described above.
    • Protect patient studies with authentication or expiring signed tokens. Do not expose a study endpoint publicly without access controls.
    • Ensure your endpoint returns DICOM bytes rather than an HTML login page or an unrelated file.
8. Troubleshooting
Images cannot load	The image URLs may use HTTP. Serve them over HTTPS or use the smartviewer.js integration.
CORS/download error	Configure the server to allow https://smartjoans.space and verify the file URL.
A web page is returned instead of a DICOM file	The URL may be returning a login page. Review access control and endpoint responses.
Study could not be opened	Check that the manifest URL returns valid JSON and that the study has not expired.
No images could be read	Confirm that the selected files are actual DICOM files rather than JPEG images or ZIP archives.
9. Intended use and safety notice
SmartViewer is a sharing and secondary-viewing tool. It is not a certified medical device and must not be used for primary diagnosis or official reporting. Primary interpretation and reporting should be performed on an appropriate certified PACS workstation with a calibrated display.
10. Suggested GitHub README outline
Use the sections below when publishing the project on GitHub:
    • Project title and short description
    • Feature list
    • Screenshots (the images in this document can be exported into a repository /docs/screenshots/ folder)
    • Getting started / supported inputs
    • API integration examples
    • Server configuration and CORS requirements
    • Troubleshooting
    • Privacy statement and intended-use disclaimer
    • License and contribution instructions (add the actual project license and contribution policy before publishing)
