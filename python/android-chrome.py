import os
from time import sleep

import unittest
import json

from appium import webdriver

class ChromeTests(unittest.TestCase):

    def setUp(self):
        desired_caps =  {
            "deviceName":"Android",
            "browserName" : "Chrome",
            "platformName":"Android",
            "platformVersion":"4.4"
        }
        self.driver = webdriver.Remote("http://localhost:4723/wd/hub", desired_caps)

    def tearDown(self):
        # end the session
        self.driver.quit()


    def test_is_text_present(self):
        self.driver.get("http://google.com")
        el = self.driver.find_element_by_name("q")
        el.send_keys("PyCon Argentina 2015")
        el.submit()
        title = self.driver.title
        self.assertIn("PyCon", title)


if __name__ == '__main__':
    # run test suite
    suite = unittest.TestLoader().loadTestsFromTestCase(ChromeTests)
    unittest.TextTestRunner(verbosity=2).run(suite)


