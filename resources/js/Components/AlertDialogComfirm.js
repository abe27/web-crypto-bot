import React, { useRef } from 'react'
import {
  AlertDialog,
  AlertDialogBody,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogContent,
  AlertDialogOverlay,
  Button,
} from '@chakra-ui/react'

const AlertDialogComfirm = ({
  isOpen = false,
  onClose = false,
  title = 'Delete Customer',
  description = "Are you sure? You can't undo this action afterwards.",
}) => {
  const cancelRef = useRef()

  return (
    <>
      <AlertDialog
        isOpen={isOpen}
        leastDestructiveRef={cancelRef}
        onClose={onClose}
        isCentered
      >
        <AlertDialogOverlay>
          <AlertDialogContent>
            <AlertDialogHeader fontSize="lg" fontWeight="bold">
              {title}
            </AlertDialogHeader>
            <AlertDialogBody>{description}</AlertDialogBody>
            <AlertDialogFooter>
              <Button name="cancel" ref={cancelRef} onClick={onClose}>
                ยกเลิก
              </Button>
              <Button name="confirm" colorScheme="red" onClick={onClose} ml={3}>
                ยืนยัน
              </Button>
            </AlertDialogFooter>
          </AlertDialogContent>
        </AlertDialogOverlay>
      </AlertDialog>
    </>
  )
}

export default AlertDialogComfirm
