import unittest

from appium import webdriver

class ChromeTests(unittest.TestCase):

    def setUp(self):
        appium = "http://%s:%s@ondemand.saucelabs.com:80/wd/hub"
        appium = appium % ("SAUCE_USERNAME", "SAUCE_KEY")

        desired_caps =  {
            "deviceName":'Samsung Galaxy S5 Device',
            "platformVersion":'4.4',
            "platformName":'Android',
            "app":'http://saucelabs.com/example_files/ContactManager.apk',
            "app-activity": ".ContactManager",
            "app-package": "com.example.android.contactmanager",
            "name":"Android Device native test"
        }
        self.driver = webdriver.Remote(appium, desired_caps)

    def tearDown(self):
        # end the session
        self.driver.quit()


    def test_is_text_present(self):
        el = self.driver.find_element_by_name("Add Contact")
        el.click


if __name__ == '__main__':
    # run test suite
    suite = unittest.TestLoader().loadTestsFromTestCase(ChromeTests)
    unittest.TextTestRunner(verbosity=2).run(suite)


